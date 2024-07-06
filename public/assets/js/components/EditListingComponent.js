Vue.component('edit-listing-component', { template: `
<div v-if="editing">
      <h2>Edit Listing</h2>
      <form @submit.prevent="updateListing">
        <input v-model="currentListing.title" placeholder="Title" required>
        <input v-model="currentListing.description" placeholder="Description">
        <input v-model="currentListing.price" type="number" placeholder="Price" required>
        <button type="submit">Update Listing</button>
        <button @click="$emit('cancel-edit')">Cancel</button>
      </form>
    </div>
`, props: ['currentListing', 'editing'], methods: { updateListing() {
this.$emit('update-listing', this.currentListing); } } });
