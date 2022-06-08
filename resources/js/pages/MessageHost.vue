<template>
  <div>
    <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#exampleModal"
      data-whatever="@mdo"
    >
      Send a message to the host
    </button>

    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="sender_name" class="col-form-label"
                  >Sender Name:</label
                >
                <input
                  v-model="sender_name"
                  type="text"
                  class="form-control"
                  id="sender_name"
                />
                <div class="alert alert-danger" v-if="errors.sender_name">
                  <p v-for="(error, index) in errors.sender_name" :key="index">
                    {{ error }}
                  </p>
                </div>
              </div>
              <div class="form-group">
                <label for="sender_email" class="col-form-label"
                  >Sender Email:</label
                >
                <input
                  v-model="sender_email"
                  type="email"
                  class="form-control"
                  id="sender_email"
                />
                <div class="alert alert-danger" v-if="errors.sender_email">
                  <p v-for="(error, index) in errors.sender_email" :key="index">
                    {{ error }}
                  </p>
                </div>
              </div>
              <div  class="form-group">
                <label for="object" class="col-form-label">Object:</label>
                <input
                  v-model="object"
                  type="text"
                  class="form-control"
                  id="object"
                />
                <div class="alert alert-danger" v-if="errors.object">
                  <p v-for="(error, index) in errors.object" :key="index">
                    {{ error }}
                  </p>
                </div>
              </div>

              <div class="form-group">
                <label for="content" class="col-form-label">Content:</label>
                <textarea
                  v-model="content"
                  class="form-control"
                  id="content"
                  cols="30"
                  rows="10"
                ></textarea>
                <div class="alert alert-danger" v-if="errors.content">
                  <p v-for="(error, index) in errors.content" :key="index">
                    {{ error }}
                  </p>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <div v-if="success">
              <h3 style="color: green">
                L'Email è stata inviata correttamente!
              </h3>
            </div>
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button
              type="submit"
              @click.prevent="sendMessage()"
              class="btn btn-primary"
            >
              Send message
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "MessageHost",
  data: function () {
    return {
      place_id: this.$route.params.id,
      sender_email: "",
      sender_name: "",
      object: "",
      content: "",
      success: false,
      errors: {},
    };
  },
  methods: {
    getUser() {
      axios.get("/api/messages/take").then((response) => {
        if (response) {
          console.log(response);
        }
      });
    },
    sendMessage: function () {
      axios
        .post("/api/messages/store", {
          place_id: this.place_id,
          sender_email: this.sender_email,
          sender_name: this.sender_name,
          object: this.object,
          content: this.content,
        })
        .then((response) => {
          if (response.data.success) {
            this.place_id = "";
            this.sender_name = "";
            this.sender_email = "";
            this.object = "";
            this.content = "";
            this.success = true;
            this.error = {};
          } else {
            this.success = false;
            this.errors = response.data.errors;
          }
        });
    },
  },
  created: function () {
    this.getUser();
  },
};
</script>

<style lang="scss" scoped>
</style>