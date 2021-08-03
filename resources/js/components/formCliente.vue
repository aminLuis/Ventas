<template>
   
   <div class="container">

       <div class="card">
           <div class="card-header">
               <h5>Registro de cliente</h5>
           </div>
       </div>

      <br>
      <button @click="addCliente()" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Nuevo</button>
      <hr>

      <table class="table table-hover">

          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>Tipo de documento</th>
                  <th>Número documento</th>
                  <th>Ciudad</th>
                  <th>Latitud</th>
                  <th>Longitud</th>
              </tr>
          </thead>

          <tbody>
                <tr v-for="client in clientes.data" :key="client.id">
                    <td>{{client.nombre}}</td>
                    <td>{{client.apellidos}}</td>
                    <td>{{client.tipoDocumento}}</td>
                    <td>{{client.numeroDocumento}}</td>
                    <td>{{client.ciudad}}</td>
                    <td>{{client.latitud}}</td>
                    <td>{{client.longitud}}</td>
                    <td>
                         <button @click="editCliente(),cargarDatos(client)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</button>
                         <button @click="eliminarCliente(client)" class="btn btn-danger">Borrar</button>
                         <a href="ubicacion">
                           <button class="btn btn-success">Ubicar</button>
                         </a>
                    </td>
                </tr>
          </tbody>
   
      </table>
          <pagination :data="clientes" @pagination-change-page="listar"></pagination>


       <div class="modal fade" tabindex="-1" id="exampleModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white">{{tituloModal}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                  
                          <form @submit.prevent="agregarCliente" v-if="add">

                            <div class="row">
                                
                                <div class="col">
                                        <div class="form-group">
                                            <label>{{'Tipo de documento'}}</label>
                                            <select v-model="datosCliente.tipoDocumento" class="form-control" required>
                                                    <option></option>
                                                    <option v-for="doc in documento" :key="doc">
                                                        {{doc}}
                                                    </option>
                                            </select>
                                        </div>
                                </div>

                                <div class="col">

                                     <div class="form-group">
                                        <label>{{'Número de documento'}}</label>
                                        <input v-model="datosCliente.numeroDocumento" type="number" class="form-control" required>
                                    </div>

                                </div>

                            </div>

                            <div class="row">

                               <div class="col">

                                   <div class="form-group">
                                        <label>{{'Nombre'}}</label>
                                        <input v-model="datosCliente.nombre" type="text" class="form-control" required>
                                   </div>

                               </div>

                               <div class="col">

                                  <div class="form-group">
                                        <label>{{'Apellidos'}}</label>
                                        <input v-model="datosCliente.apellidos" type="text" class="form-control" required>
                                  </div>

                               </div>

                            </div>


                            <div class="row">
                                
                               <div class="col">

                                  <div class="form-group">
                                        <label>{{'Ciudad'}}</label>
                                        <input v-model="datosCliente.ciudad" type="text" class="form-control" required>
                                  </div>

                               </div>

                               <div class="col">

                                  <div class="form-group">
                                        <label>{{'Latitud'}}</label>
                                        <input v-model="datosCliente.latitud" type="number" step="any" class="form-control" required>
                                  </div>

                               </div>

                            </div>  

                             

                             <div class="row">

                                 <div class="col">

                                    <div class="form-group">
                                        <label>{{'Longitud'}}</label>
                                        <input v-model="datosCliente.longitud" type="number" step="any" class="form-control" required>
                                    </div>

                                 </div>

                                 <div class="col"></div>

                             </div>

                              <button type="submit" class="btn btn-success">Guardar</button>
                              
                          </form>

                          <form @submit.prevent="actualizarCliente" v-else> 

                               <div class="row">
                                
                                <div class="col">
                                        <div class="form-group">
                                            <label>{{'Tipo de documento'}}</label>
                                            <select v-model="datosCliente.tipoDocumento" class="form-control" required>
                                                    <option></option>
                                                    <option v-for="doc in documento" :key="doc">
                                                        {{doc}}
                                                    </option>
                                            </select>
                                        </div>
                                </div>

                                <div class="col">

                                     <div class="form-group">
                                        <label>{{'Número de documento'}}</label>
                                        <input v-model="datosCliente.numeroDocumento" type="number" class="form-control" required>
                                    </div>

                                </div>

                            </div>

                            <div class="row">

                               <div class="col">

                                   <div class="form-group">
                                        <label>{{'Nombre'}}</label>
                                        <input v-model="datosCliente.nombre" type="text" class="form-control" required>
                                   </div>

                               </div>

                               <div class="col">

                                  <div class="form-group">
                                        <label>{{'Apellidos'}}</label>
                                        <input v-model="datosCliente.apellidos" type="text" class="form-control" required>
                                  </div>

                               </div>

                            </div>


                            <div class="row">
                                
                               <div class="col">

                                  <div class="form-group">
                                        <label>{{'Ciudad'}}</label>
                                        <input v-model="datosCliente.ciudad" type="text" class="form-control" required>
                                  </div>

                               </div>

                               <div class="col">

                                  <div class="form-group">
                                        <label>{{'Latitud'}}</label>
                                        <input v-model="datosCliente.latitud" type="number" step="any" class="form-control" required>
                                  </div>

                               </div>

                            </div>  

                             

                             <div class="row">

                                 <div class="col">

                                    <div class="form-group">
                                        <label>{{'Longitud'}}</label>
                                        <input v-model="datosCliente.longitud" type="number" step="any" class="form-control" required>
                                    </div>

                                 </div>

                                 <div class="col"></div>

                             </div>

                              <button type="submit" class="btn btn-success">Guardar cambios</button>

                          </form>
                  
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
               documento:[
                   'Cédula de ciudadanía',
                   'Tarjeta de indentidad',
                   'Registro civil de nacimiento',
                   'Cédula extranjera',
                   'Pasaporte',
               ],
               datosCliente:{
                   tipoDocumento:'',
                   numeroDocumento:'',
                   nombre:'',
                   apellidos:'',
                   ciudad:'',
                   latitud:'',
                   longitud:'',
               },
               tituloModal:"",
               add:true,
               clientes:{},
               idUpdate:''
            };
        },

        methods: {

          async addCliente(){
             this.tituloModal = "Agregar cliente";
             this.add = true;
             this.limpiarCampos();
          },
          
          async editCliente(){
              this.tituloModal = "Editar registro cliente";
              this.add = false;
          },

          async limpiarCampos(){
            this.datosCliente={
                tipoDocumento:'',
                numeroDocumento:'',
                nombre:'',
                apellidos:'',
                ciudad:'',
                latitud:'',
                longitud:''
            }
          },

         async listar(page=1){
             axios.get('cliente?page='+page).then((res)=>{
                console.log(res);
                this.clientes = res.data;
              });
         },

          async agregarCliente(){
              axios.post("cliente", this.datosCliente).then((result) => {
                   console.log(result);
                    alert('Cliente agregado');
                    this.limpiarCampos();
                    this.listar();
                   
                }).catch(function(err){
                console.log(err);
            });
          },

          async actualizarCliente(){
             axios.put('cliente/'+this.idUpdate,this.datosCliente).then((result)=>{
                console.log(result);
                this.listar();
            }).catch(function(err){
                console.log(err);
            });
          },

          async eliminarCliente(client){
             const confirmacion = confirm(`Desea eliminar cliente: ${client.nombre}`);
             if(confirmacion){
                    const res = await axios.delete('cliente/'+client.id);
                    this.listar();
                }
          },

          async cargarDatos(client){
                  this.datosCliente={
                      tipoDocumento:client.tipoDocumento,
                      numeroDocumento:client.numeroDocumento,
                      nombre:client.nombre,
                      apellidos:client.apellidos,
                      ciudad:client.ciudad,
                      latitud:client.latitud,
                      longitud:client.longitud
                  }
                  this.idUpdate = client.id;
          },
      
        },

        mounted() {
            console.log('Component mounted.')
        },
        created() {
           this.listar();      
        }

    }
</script>
