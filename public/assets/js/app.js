new Vue({
  el: '#app',
  data: {
    listings: [],
    newListing: {
      title: '',
      description: '',
      price: ''
    },
    editing: false,
    currentListing: {
      id: '',
      title: '',
      description: '',
      price: ''
    }
  },
  created() {
    this.fetchListings();
  },
  methods: {
    fetchListings() {
      axios.get('/api', {
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json'
        }
      })
      .then(response => {
        console.log('Listings:', response.data);
        this.listings = response.data;
      })
      .catch(error => {
        console.error('Error fetching listings:', error);
      });
    },
    addListing() {
      axios.post('/api', this.newListing, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json'
        }
      })
      .then(() => {
        this.fetchListings();
        this.newListing = {
          title: '',
          description: '',
          price: ''
        };
      })
      .catch(error => {
        console.error('Error adding listing:', error);
      });
    },
    editListing(listing) {
      this.editing = true;
      this.currentListing = { ...listing };
    },
    updateListing() {
      axios.put('/api', this.currentListing, {
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json'
        }
      })
      .then(() => {
        this.fetchListings();
        this.editing = false;
        this.currentListing = {
          id: '',
          title: '',
          description: '',
          price: ''
        };
      })
      .catch(error => {
        console.error('Error updating listing:', error);
      });
    },
    deleteListing(id) {
      axios.delete('/api', {
        data: { id },
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json'
        }
      })
      .then(() => {
        this.fetchListings();
      })
      .catch(error => {
        console.error('Error deleting listing:', error);
      });
    },
    cancelEdit() {
      this.editing = false;
      this.currentListing = {
        id: '',
        title: '',
        description: '',
        price: ''
      };
    }
  }
});