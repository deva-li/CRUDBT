<template>
    <div class='container py-4'>
        <div class='row justify-content-center'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-header'>Detail Guest</div>
                    <div class='card-body'>
                            <div class='form-group'>
                                <label htmlFor='nama'>Nama</label>
                                <input type="text" class="form-control" id="nama" v-model="guestbook.nama" disabled>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='alamat'>Alamat</label>
                                <input type="text" class="form-control" id="alamat" v-model="guestbook.alamat" disabled>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='tujuan'>Tujuan</label>
                                <input type="text" class="form-control" id="tujuan" v-model="guestbook.tujuan" disabled>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='nomerhp'>Nomor HP</label>
                                <input type="text" class="form-control" id="nomerhp" v-model="guestbook.nomerhp" disabled>
                            </div>
                            <div class='form-group'>
                                <label htmlFor='created_at'>Waktu Bertamu</label>
                                <input type="text" class="form-control" id="nomerhp" v-model="guestbook.created_at" disabled>
                            </div>
                        <div class='form-group'>
                            <router-link :to="{ name: 'home' }" class="btn btn-secondary">Back</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
        return {
            guestbook:{},
        }
    },
    created() {
        let uri = `/api/guestbook/show/${this.$route.params.id}`;
        this.axios.get(uri).then((response) => {
            this.guestbook = response.data;
        });
    },
    method: {

    }
  }
</script>