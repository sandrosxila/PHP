<template>
    <div>
        <h1>Contacts</h1>
        <form action="#" @submit.prevent="edit ? updateContact(contact.id) : createContact()">
            <div class="form-group">
                <label for="name">Name</label>
                <input v-model="contact.name" type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input v-model="contact.email" type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input v-model="contact.phone" type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <button v-show="!edit" type="submit" class="btn btn-primary">New Contact</button>
                <button v-show="edit" type="submit" class="btn btn-primary">Edit Contact</button>
            </div>
        </form>
        <h2>Contacts</h2>
        <ul class="list-group">
            <li v-for="contact in list" class="list-group-item">
                <strong>{{ contact.name }}</strong> {{ contact.email }} {{ contact.phone }}
                <button @click="showContact(contact.id)" class="btn btn-info btn-sm">
                    Edit
                </button>
                <button @click="deleteContact(contact.id)" class="btn btn-danger btn-sm">
                    Delete
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data: function () {
        return {
            edit: false,
            list: [],
            contact: {
                id: '',
                name: '',
                email: '',
                phone: ''
            }
        }
    },
    mounted: function () {
        this.fetchContactList();
    },
    methods: {
        fetchContactList: function () {
            axios.get('api/contacts').then((response) => {
                this.list = response.data;
            }).catch((err) => console.log(err));
        },
        createContact: function () {
            const self = this;
            const params = Object.assign({}, self.contact);
            axios.post('/api/contact/store', params).then(() => {
                self.contact.name = "";
                self.contact.email = "";
                self.contact.phone = "";
                self.fetchContactList();
            }).catch((err) => console.log(err));
        },
        showContact: function (id) {
            const self = this;
            axios.get(`api/contact/${id}`).then((response) => {
                self.contact.id = response.data.id;
                self.contact.name = response.data.name;
                self.contact.email = response.data.email;
                self.contact.phone = response.data.phone;
                self.edit = true;
            }).catch((err) => console.log(err));
        },
        updateContact: function (id) {
            const self = this;
            const params = Object.assign({}, self.contact);
            axios.patch(`/api/contact/${id}`, params).then(() => {
                self.contact.name = "";
                self.contact.email = "";
                self.contact.phone = "";
                self.fetchContactList();
                self.edit = false;
            }).catch((err) => console.log(err));
        },
        deleteContact: function (id) {
            const self = this;
            axios.delete(`api/contact/${id}`).then(() => {
                self.contact.name = "";
                self.contact.email = "";
                self.contact.phone = "";
                self.edit = false;
                self.fetchContactList();
            }).catch((err) => console.log(err));
        }
    }
}
</script>
