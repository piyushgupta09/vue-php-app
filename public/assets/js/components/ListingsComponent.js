Vue.component('listings-component', {
  template: `
    <div>
      <ul v-if="listings.length > 0">
        <li v-for="listing in listings" :key="listing.id">
          {{ listing.title }} - {{ listing.price }}
          <button @click="$emit('edit-listing', listing)">Edit</button>
          <button @click="$emit('delete-listing', listing.id)">Delete</button>
        </li>
      </ul>
      <div v-else>
        No listings found. Add one above.
      </div>
    </div>
  `,
  props: ['listings']
});