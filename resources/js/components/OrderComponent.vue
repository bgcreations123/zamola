<template>
    <div>
        <form action="./api/order" method="POST" @submit.prevent="order()">
          <input type="hidden" name="client" v-bind:value="client">
          <section v-if="step == 1">
            <h2>Shipment Information</h2>
            <!-- <span v-for="error in errors" class="text-danger">{{ error }}</span> -->
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="category">Shipment Category</label>
                <select id="category" v-model="category" class="form-control form-control-sm" name="category">
                  <option value="" selected disabled hidden>Please select one</option>
                  <option v-for="category in categories" :key="category.id" :value="category.id">
                    {{category.name}}
                  </option>
                </select>
                <span class="text-danger">{{ errors.get('category') }}</span>
              </div>
              <div class="form-group col-md-4">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control form-control-sm" id="quantity" placeholder="00" name="quantity" v-model="quantity">
                <span class="text-danger">{{ errors.get('quantity') }}</span>
              </div>
              <div class="form-group col-md-4">
                <label for="weight">Weight (lbs)</label>
                <input type="text" class="form-control form-control-sm" id="weight" placeholder="00" name="weight" v-model="weight">
                <span class="text-danger">{{ errors.get('weight') }}</span>
              </div>
            </div>  
            
            <div class="form-group">
              <label for="dimentions">Dimensions: Length x Width x Height (cm)</label>
              <div class="form-row align-items-center">
                <div class="col-sm-4 my-1">
                  <label class="sr-only" for="length">Length</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text form-control-sm">L</div>
                    </div>
                    <input type="text" class="form-control form-control-sm" id="length" placeholder="Length"  name="length" v-model="length">
                  </div>
                  <span class="text-danger">{{ errors.get('length') }}</span>
                </div>
                <div class="col-sm-4 my-1">
                  <label class="sr-only" for="width">Width</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text form-control-sm">W</div>
                    </div>
                    <input type="text" class="form-control form-control-sm" id="width" placeholder="Width"  name="width" v-model="width">
                  </div>
                  <span class="text-danger">{{ errors.get('width') }}</span>
                </div>
                <div class="col-sm-4 my-1">
                  <label class="sr-only" for="height">Height</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text form-control-sm">H</div>
                    </div>
                    <input type="text" class="form-control form-control-sm" id="height" placeholder="Height" name="height" v-model="height">
                  </div>
                  <span class="text-danger">{{ errors.get('height') }}</span>
                </div>
              </div>
              <div class="form-group">
                <label for="dimentions">Payment Method</label>
                <select id="payment" v-model="payment" class="form-control form-control-sm" name="payment">
                  <option value="" selected disabled hidden>Please select one</option>
                  <option v-for="method in methods" :key="method.id" :value="method.id">
                    {{ method.name }}
                  </option>
                </select>
                <span class="text-danger">{{ errors.get('payment') }}</span>
              </div>
              <div class="form-group">
                <label for="dimentions">Description</label>
                <textarea class="form-control form-control-sm" id="description" placeholder="Any Description"  name="description" v-model="description"></textarea>
              </div>
            </div>
          </section>

          <section v-if="step == 2">
            <h2>Origin Information</h2>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Full Name</label>
                <input type="text" class="form-control form-control-sm" id="name" placeholder="John Doe" name="sendername" v-model="sendername">
                <span class="text-danger">{{ errors.get('sendername') }}</span>
              </div>
              <div class="form-group col-md-6">
                <label for="mobile">Mobile Phone Number</label>
                <input type="text" class="form-control form-control-sm" id="mobile" placeholder="+1 (250) 815-6055" name="sendermobile" v-model="sendermobile">
                <span class="text-danger">{{ errors.get('sendermobile') }}</span>
              </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="address" class="form-control form-control-sm" id="address" placeholder="1636 -00100 NRB KEN" name="senderaddress" v-model="senderaddress">
                <span class="text-danger">{{ errors.get('senderaddress') }}</span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control form-control-sm" id="email" placeholder="John@Doe.com" name="senderemail" v-model="senderemail">
                <span class="text-danger">{{ errors.get('senderemail') }}</span>
            </div>
            <div class="form-group">
                <label for="location">Physical Location (Destination)</label>
                <input type="text" class="form-control form-control-sm" id="location" placeholder="Kibuye Market, Stall No. 191 KSM KEN" name="senderlocation" v-model="senderlocation">
                <span class="text-danger">{{ errors.get('senderlocation') }}</span>
            </div>
          </section>

          <section v-if="step == 3">
            <h2>Destination Information</h2>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Full Name</label>
                <input type="text" class="form-control form-control-sm" id="name" placeholder="John Doe" name="receivername" v-model="receivername">
                <span class="text-danger">{{ errors.get('receivername') }}</span>
              </div>
              <div class="form-group col-md-6">
                <label for="mobile">Mobile Phone Number</label>
                <input type="text" class="form-control form-control-sm" id="mobile" placeholder="+1 (250) 815-6055" name="receivermobile" v-model="receivermobile">
                <span class="text-danger">{{ errors.get('receivermobile') }}</span>
              </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="address" class="form-control form-control-sm" id="address" placeholder="1636 -00100 NRB KEN" name="receiveraddress" v-model="receiveraddress">
                <span class="text-danger">{{ errors.get('receiveraddress') }}</span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control form-control-sm" id="email" placeholder="John@Doe.com" name="receiveremail" v-model="receiveremail">
                <span class="text-danger">{{ errors.get('receiveremail') }}</span>
            </div>
            <div class="form-group">
                <label for="location">Physical Location (Destination)</label>
                <input type="text" class="form-control form-control-sm" id="location" placeholder="Kibuye Market, Stall No. 191 KSM KEN" name="receiverlocation" v-model="receiverlocation">
                <span class="text-danger">{{ errors.get('receiverlocation') }}</span>
            </div>
          </section>

          <button v-if="step != 1" @click.prevent="prevStep">Previous Step</button>

          <button v-if="step != totalsteps" @click.prevent="nextStep">Next Step</button>

          <button v-if="step == totalsteps" type="submit">Order</button>

        </form>
    </div>
</template>

<script>
    class Errors{

      constructor(){
        this.errors = {}
      }

      get(field){
        if(this.errors[field]){
          return this.errors[field][0];
        }
      }

      record(errors){
        this.errors = errors.errors;
      }

    }

    export default {

        data() {
            return {

                errors: new Errors(),
                step: 1,
                totalsteps: 3,

                categories: [],
                methods: [],
                category: null,
                quantity: null,
                weight: null,
                length: null,
                width: null,
                height: null,
                sendername: null,
                sendermobile: null,
                senderaddress: null,
                senderemail: null,
                senderlocation: null,
                receivername: null,
                receivermobile: null,
                receiveraddress: null,
                receiveremail: null,
                receiverlocation: null,
                payment: null,
                description: null,

                client: document.querySelector('meta[name="client-id"]').getAttribute('content'),
            }
        },

        methods: {
            getCategories(){
                axios.get('./api/category')
                .then(response => 
                    this.categories = response.data
                )
                .catch(function(error) {
                    console.log('an error occured ' + error);
                });
            },

            getPaymentMethods(){
                axios.get('./api/payment_method')
                .then(response => 
                    this.methods = response.data
                )
                .catch(function(error) {
                    console.log('an error occured ' + error);
                });
            },

            prevStep(){
                this.step--;
            },

            nextStep(){

                if(this.step == 1){
                  axios.post('./api/step_1', {
                    category: this.category,
                    quantity: this.quantity,
                    weight: this.weight,
                    length: this.length,
                    width: this.width,
                    height: this.height,
                    payment: this.payment,
                  })
                  .then(function(response){
                    return this.step++
                    console.log(response)
                  }.bind(this))
                  .catch(error => this.errors.record(error.response.data))
                }

                if(this.step == 2){
                  axios.post('./api/step_2', {
                    sendername: this.sendername,
                    sendermobile: this.sendermobile,
                    senderaddress: this.senderaddress,
                    senderemail: this.senderemail,
                    senderlocation: this.senderlocation,
                  })
                  .then(function(response){
                    return this.step++
                  }.bind(this))
                  .catch(error => this.errors.record(error.response.data))
                }
            },

            order(){
              axios.post('./api/order', {
                category: this.category,
                quantity: this.quantity,
                weight: this.weight,
                length: this.length,
                width: this.width,
                height: this.height,
                payment: this.payment,
                sendername: this.sendername,
                sendermobile: this.sendermobile,
                senderaddress: this.senderaddress,
                senderemail: this.senderemail,
                senderlocation: this.senderlocation,
                receivername: this.receivername,
                receivermobile: this.receivermobile,
                receiveraddress: this.receiveraddress,
                receiveremail: this.receiveremail,
                receiverlocation: this.receiverlocation,
                description: this.description,
                client: this.client,
              })
              .then(function (response) {
                console.log(response)
                // window.location = "/"
                window.location = response.data.redirect
                alert('Your order has been made!')
              })
              .catch(error => this.errors.record(error.response.data))
              // .catch(function(errors){
              //   return this.errors.record(error.response.data)
              // }.bind(this))
            },
        },

        mounted() {
          console.log('Component mounted.');

          this.getCategories();

          this.getPaymentMethods();
        },
    };
</script>