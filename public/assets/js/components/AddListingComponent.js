Vue.component('add-listing-component', {
  template: `
    <form @submit.prevent="addListing">
      <input v-model="newListing.title" placeholder="Title" required>
      <input v-model="newListing.description" placeholder="Description">
      <input v-model="newListing.price" type="number" placeholder="Price" required>
      <button type="submit">Add Listing</button>
    </form>
  `,
  data() {
    return {
      newListing: {
        title: '',
        description: '',
        price: ''
      }
    }
  },
  methods: {
    addListing() {
      this.$emit('add-listing', this.newListing);
      this.newListing = {
        title: '',
        description: '',
        price: ''
      };
    }
  }
});