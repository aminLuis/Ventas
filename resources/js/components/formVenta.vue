<template>
    <div class="container-fluid">
    
       <div class="card">
        <div class="card-header">
            Registro de ventas
        </div>
        </div>

           <br>
            

            <div class="row">
                
               <div class="col">
                   
                   <div class="acciones">
                        <button @click="addVenta();obtenerHora()" class="btn btn-success ancho" data-toggle="modal" data-target="#exampleModal">Nueva</button>
                        <button @click="informeGeneral()" class="btn btn-info ancho text-white" data-toggle="modal" data-target="#informeGeneral">Informe general</button>
                        <a href="inicio">
                          <button class="btn btn-info ancho text-white">Registro cliente</button>
                        </a>
                   </div>

               </div>
               <div class="col-9">
                     <table class="table table-hover">
                         <thead>
                             <tr>
                                 <th>Cliente</th>
                                 <th>Total venta</th>
                                 <th>Hora</th>
                                 <th>Fecha</th>
                                 <th>Acción</th>
                             </tr>
                         </thead>

                         <tbody>
                             <tr v-for="ven in ventas.data" :key="ven.id">
                                 <td>{{ven.nombreCliente}}</td>
                                 <td>{{ven.total}}</td>
                                 <td>{{ven.hora}}</td>
                                 <td>{{ven.fecha}}</td>
                                 <td>
                                     <button @click="editVenta();cargarDatos(ven)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</button>
                                     <button @click="eliminarVenta(ven)" class="btn btn-danger">Borrar</button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                    <pagination :data="ventas" @pagination-change-page="listar"></pagination>
               </div>

            </div>

           <!-- Modal para formulario de registro de ventas -->
            <div class="modal fade" tabindex="-1" id="exampleModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white">{{tituloModal}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                      <form @submit.prevent="agregarVenta" v-if="add">

                            <div class="form-group">
                               <label>{{'Número de documento cliente'}}</label>
                               <input v-model="datosVenta.numeroDocumento" type="number" class="form-control" required>
                           </div>

                           <div class="form-group">
                               <label>{{'Nombre cliente'}}</label>
                               <input v-model="datosVenta.nombreCliente" type="text" class="form-control" required>
                           </div>

                           <div class="form-group">
                               <label>{{'Total valor venta'}}</label>
                               <input v-model="datosVenta.total" type="number" class="form-control" required>
                           </div>

                           <div class="form-group">
                               <label>{{'Fecha'}}</label>
                               <input v-model="datosVenta.fecha" type="date" class="form-control" required>
                           </div>

                        <button @click="buscarCliente()" class="btn btn-success">Guardar</button>

                      </form>

                      <form @submit.prevent="actualizarVenta" v-else>

                            <div class="form-group">
                               <label>{{'Número de documento cliente'}}</label>
                               <input v-model="datosVenta.numeroDocumento" type="number" class="form-control" required>
                           </div>

                           <div class="form-group">
                               <label>{{'Nombre cliente'}}</label>
                               <input v-model="datosVenta.nombreCliente" type="text" class="form-control" required>
                           </div>

                           <div class="form-group">
                               <label>{{'Total valor venta'}}</label>
                               <input v-model="datosVenta.total" type="number" class="form-control" required>
                           </div>

                           <div class="form-group">
                               <label>{{'Fecha'}}</label>
                               <input v-model="datosVenta.fecha" type="date" class="form-control" required>
                           </div>

                        <button class="btn btn-success">Guardar cambios</button>

                      </form>

                </div>
                
                </div>
            </div>
            </div>


           <!-- Modal informe general -->
            <div class="modal fade" tabindex="-1" id="informeGeneral">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title text-white">Informe general</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                          
                          <div class="alert alert-info">
                              <h6>Total ventas hoy: {{informe.total}}</h6>
                          </div>

                          <div class="alert alert-info">
                              <h6>Venta mayor valor: {{informe.mayor}}</h6>
                          </div>

                           <div class="alert alert-info">
                              <h6>Venta menor valor: {{informe.menor}}</h6>
                          </div>

                          <div class="alert alert-info">
                              <h6>Venta promedio: {{informe.promedioVentas}}</h6>
                          </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
                </div>

    </div>
</template>

<script>

    export default {

      data() {
          return {
              add: true,
              tituloModal:'',
              datosVenta:{
                  idCliente:'1',
                  numeroDocumento:'',
                  nombreCliente:'',
                  total:'',
                  hora:'',
                  fecha:''  
              },
              horaActual:'',
              busqueda:[],
              ventas:{},
              idUpdate:'',
              informe:[]
              
          };
      },

        methods : {

            async addVenta(){
                this.add = true;
                this.tituloModal="Registrar venta";
                //this.limpiarCampos();
            },

            async editVenta(){
              this.add = false;
              this.tituloModal ='Editar venta';
            },

            async obtenerHora(){
                var d = new Date();
                var h = d.getHours();
                var m = d.getMinutes();
                var s = d.getSeconds();
                //return h+' : '+m+' : '+s;
                this.horaActual = h+' : '+m+' : '+s;
            },

            async limpiarCampos(){
                this.datosVenta={
                    numeroDocumento:'',
                    nombreCliente:'',
                    total:'',
                    fecha:''
                }
            },

            async listar(page=1){
             axios.get('listaVentas?page='+page).then((res)=>{
                console.log(res);
                this.ventas = res.data;
              });

            },

            async buscarCliente(){
              axios.get('cliente/',this.datosVenta.numeroDocumento).then((res)=>{
                console.log(res);
                 this.busqueda = res.data;
                //return this.busqueda;
              });
  
            },
            
            async agregarVenta(){

                if(!this.busqueda.nombreCliente==this.datosVenta.numeroDocumento){

                 axios.post("venta", {
                  idCliente:this.datosVenta.idCliente,
                  numeroDocumento:this.datosVenta.numeroDocumento,
                  nombreCliente:this.datosVenta.nombreCliente,
                  total:this.datosVenta.total,
                  hora:this.horaActual,
                  fecha:this.datosVenta.fecha
                    }).then((result) => {
                        console.log(result);
                            alert('Venta agregada');
                            this.limpiarCampos();
                            //this.listar();
                        
                        }).catch(function(err){
                        console.log(err);
                    });

                }else{
                    alert ('Cliente no encontrado');
                }
               
            },

            async cargarDatos(ven){
              this.datosVenta={
                  numeroDocumento:ven.numeroDocumento,
                  nombreCliente:ven.nombreCliente,
                  total:ven.total,
                  fecha:ven.fecha
              }
              this.idUpdate = ven.id;
            },

            async actualizarVenta(){
                axios.put('venta/'+this.idUpdate,{
                    numeroDocumento:this.datosVenta.numeroDocumento,
                    nombreCliente:this.datosVenta.nombreCliente,
                    total:this.datosVenta.total,
                    fecha:this.datosVenta.fecha
                }).then((result) => {
                        console.log(result);
                            this.listar();
                        }).catch(function(err){
                        console.log(err);
                    });
            },

            async eliminarVenta(ven){
              const confirmacion = confirm(`Desea eliminar la venta: ${ven.total}`);
              if(confirmacion){
                    const res = await axios.delete('venta/'+ven.id);
                    this.listar();
                }
            },

            async informeGeneral(){
                    axios.get('informeGeneral').then((res) => {
                        console.log(res);
                        this.informe = res.data;
                        }).catch(function(err){
                        console.log(err);
                    });

            }

        },


        

        created(){
         this.listar();
         this.informeGeneral();
        },
 
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    .acciones{
        float: left;
        width: 200px;
        height: 400px;
        background-color: rgb(239, 240, 241);
        border-radius: 4px;
        padding: 8px;
    }

    .ancho{
        width: 185px;
        margin-top: 5px;
    }
    
    .tabla{
       text-align: center;
    }

</style>
