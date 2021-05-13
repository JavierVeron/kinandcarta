<script>
export default {
  data() {
    return {
      contacto:{
        name:"",
        company:"",
        profileimage:"",
        email:"",
        birthdate:"",
        phonenumber_work:"",
        phonenumber_personal:"",
        address:"",
        city:"",
        state:"",
        country:"",
      },
      id:0,
      modificar:true,
      modal:0,
      titulo:"",
      texto_busqueda:"",
      sel_cities:"",
      sel_states:"",
      contactos:[],
      cities:[],
      states:[],
    };
  },
  methods: {
    async listar() {
      this.getCities();
      this.getStates();
      const res = await axios.get('/api/all');
      this.contactos = res.data.data;
    },
    async buscar() {
      if (this.texto_busqueda == "") {
        this.listar();
      } else {
        const res = await axios.get('/api/search/' + this.texto_busqueda);

        if (res.data.status != "error") {
          this.contactos = res.data;
        } else {
          this.contactos = "";
        }
      }
    },
    async getCities() {
      const res = await axios.get('/api/getcities');
      this.cities = res.data.data;
    },
    async getStates() {
      const res = await axios.get('/api/getstates');
      this.states = res.data.data;
    },
    async getContactsByCity() {
      if (this.sel_cities == "") {
        this.listar();
      } else {
        const res = await axios.get('/api/getcontacts/' + this.sel_cities);
        this.contactos = res.data.data;
      }
    },
    async getContactsByState() {
      if (this.sel_states == "") {
        this.listar();
      } else {
        const res = await axios.get('/api/getcontacts/' + this.sel_states);
        this.contactos = res.data.data;
      }
    },
    async guardar() {
      if (this.modificar) {
        const res = await axios.put('/api/update/' + this.contacto.id, this.contacto);
      } else {
        const res = await axios.post('/api/post/', this.contacto);
      }
      this.cerrarModal();
      this.listar();
    },
    async eliminar(id) {
      await axios.delete('/api/delete/' + id);
      this.listar();
    },
    abrirModal(data={}){
      this.modal = 1;

      if (this.modificar) {
        this.titulo = "Edit Contact";
        this.contacto.id = data.id;
        this.contacto.name = data.name;
        this.contacto.company = data.company;
        this.contacto.profileimage = data.profileimage;
        this.contacto.email = data.email;
        this.contacto.birthdate = data.birthdate;
        this.contacto.phonenumber_work = data.phonenumber_work;
        this.contacto.phonenumber_personal = data.phonenumber_personal;
        this.contacto.address = data.address;
        this.contacto.city = data.city;
        this.contacto.state = data.state;
        this.contacto.country = data.country;     
      } else {
        this.titulo = "Add Contact";
        this.contacto.name = "";
        this.contacto.company = "";
        this.contacto.profileimage = "";
        this.contacto.email = "";
        this.contacto.birthdate = "";
        this.contacto.phonenumber_work = "";
        this.contacto.phonenumber_personal = "";
        this.contacto.address = "";
        this.contacto.city = "";
        this.contacto.state = "";
        this.contacto.country = "";  
      }
    },
    cerrarModal() {
      this.modal = 0;
    },
  },
  created() {
    this.listar();
    this.getCities();
    this.getStates();
  },
};
</script>
<style>
.mostrar{
    display: list-item;
    opacity: 1;
    background: rgba(75, 56, 143, 0.705);
}
</style>
<template>
    <div>
        <div class="modal" :class="{mostrar: modal}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{titulo}}</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="cerrarModal();"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                          <div class="col">
                            <label for="nombre">Name</label><input type="text" class="form-control" id="name" name="name" v-model="contacto.name">
                          </div>
                          <div class="col">
                            <label for="nombre">Company</label><input type="text" class="form-control" id="company" name="company" v-model="contacto.company">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <label for="nombre">Profile Image</label><input type="text" class="form-control" id="profileimage" name="profileimage" v-model="contacto.profileimage">
                          </div>
                          <div class="col">
                            <label for="nombre">Email</label><input type="text" class="form-control" id="email" name="email" v-model="contacto.email">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <label for="nombre">Birthdate</label><input type="date" class="form-control" id="birthdate" name="birthdate" v-model="contacto.birthdate">
                          </div>
                          <div class="col">
                            <label for="nombre">Phone Number (Work)</label><input type="text" class="form-control" id="phonenumber_work" name="naphonenumber_workme" v-model="contacto.phonenumber_work">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <label for="nombre">Phone Number (Personal)</label><input type="text" class="form-control" id="phonenumber_personal" name="phonenumber_personal" v-model="contacto.phonenumber_personal">
                          </div>
                          <div class="col">
                            <label for="nombre">Address</label><input type="text" class="form-control" id="address" name="address" v-model="contacto.address">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <label for="nombre">City</label><input type="text" class="form-control" id="city" name="city" v-model="contacto.city">
                          </div>
                          <div class="col">
                            <label for="nombre">State</label><input type="text" class="form-control" id="state" name="state" v-model="contacto.state">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <label for="nombre">Country</label><input type="text" class="form-control" id="country" name="country" v-model="contacto.country">
                          </div>
                          <div class="col">
                            &nbsp;
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" @click="guardar();">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="cerrarModal();">Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            <button type="button" class="btn btn-secondary" @click="modificar=false; abrirModal();">Add (+)</button>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-3 text-end">
                <input type="text" id="texto_busqueda" name="texto_busqueda" class="form-control" placeholder="Type Name, Company, Email or Phone" aria-describedby="button-addon2" v-model="texto_busqueda" title="Type Name, Company, Email or Phone to search a Contact">
                <button type="button" class="btn btn-secondary"  id="button-addon2" @click="buscar();" title="Search Contacts">Search</button>
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="cities" name="cities" v-model="sel_cities">
                  <option value="" @click="getContactsByCity();">Select City</option>
                  <option v-for="city in cities" v-bind:value="city.city" @click="getContactsByCity();">{{city.city}}</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="states" name="states" v-model="sel_states">
                  <option value="" @click="getContactsByState();">Select State</option>
                  <option v-for="state in states" v-bind:value="state.state" @click="getContactsByState();">{{state.state}}</option>
                </select>
            </div>
        </div>

        <div class="row py-5">
            <div class="col-md-12">
                <table class="table text-center">
                    <thead>
                        <tr>
                        <th scope="col">&nbsp;</th>
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th scope="col">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="contact in contactos" :key="contact.id">
                        <td><img v-bind:src="'images/' + contact.profileimage" v-bind:alt="contact.name" border="0" v-bind:title="contact.name" width="64"></td>
                        <td>{{contact.name}}</td>
                        <td>{{contact.company}}</td>
                        <td>{{contact.email}}</td>
                        <td>{{contact.phonenumber_personal}}</td>
                        <td>{{contact.city}}</td>
                        <td>{{contact.state}}</td>
                        <td>{{contact.country}}</td>
                        <td><button class="btn btn-secondary" @click="modificar=true; abrirModal(contact);" title="Edit Contact">Edit</button>&nbsp;<button class="btn btn-secondary" @click="eliminar(contact.id)" title="Delete Contact">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</template>