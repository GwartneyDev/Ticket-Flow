<template>
    <div class="row">
        <div class="col">
            <!-- Button trigger modal -->
            <button type="button" @click="showModal = !showModal">
                Add Queue +
            </button>

            <!-- Modal -->

            <div v-if="showModal" class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="Qeue">Add Queue</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="qeueName"
                                />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button
                            @click="addItem()"
                            type="submit"
                            class="btn btn-primary"
                            >
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showModal: false,
            qeueName: "",
        };
    },

    methods: {
        addItem() {
            axios
              .post("store", {
                    item: this.qeueName,
                })
                .then((response) => {
                    if (response.status == 201) {
                        this.qeueName = "";
                        conosole.log("method called");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
