<template>
  <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <router-link :to="{ name: 'home' }">Home</router-link>
        </li>
        <li class="breadcrumb-item" aria-current="page">
          <router-link :to="{ name: 'wishlist.index' }">List Wishlists</router-link>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Create Wishlists</li>
      </ol>
    </nav>
    <form @submit.prevent="onSubmit($event)">
      <div class="form-group row">
        <label for="inputitem_options" class="col-sm-3 col-form-label">Item Option</label>
        <div class="col-sm-9">
          <input
            type="text"
            class="form-control"
            id="inputitem_options"
            v-model="wishlist.item_options"
            placeholder="Item Options"
          />
          <span v-if="wishlist.error" class="text-danger">{{ messages.errors.item_options }}</span>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputshared" class="col-sm-3 col-form-label">Shared</label>
        <div class="col-sm-9">
          <input
            type="text"
            class="form-control"
            id="inputshared"
            v-model="wishlist.shared"
            placeholder="Shared"
          />
          <span v-if="wishlist.error" class="text-danger">{{ messages.errors.shared }}</span>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-light">Reset</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script>
import api from "../api/wishlists";

export default {
  data() {
    return {
      wishlist: {
        item_options: "",
        shared: "",
        error: false
      },
      messages: {
        errors: {
          item_options: "",
          shared: ""
        }
      },
      loaded: false,
      saving: false
    };
  },
  computed: {},
  methods: {
    onSubmit(event) {
      api
        .create(this.wishlist)
        .then(response => {
          console.log(response);
          if (response.data) {
            this.$router.push({
              name: "wishlist.index"
            });
          }
          console.log(response);
        })
        .catch(error => {
          console.log(error.response.data);
          this.wishlist.error = true;
          this.messages.errors = error.response.data.errors;
        });
    }
  },
  created() {}
};
</script>