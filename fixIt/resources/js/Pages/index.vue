<template>
    <div class="wrapper">
        <sidebar id="sidebar">
           <!-- <homesvg></homesvg>-->
        </sidebar>

        <div id="content">
             <!--<SideInfo></SideInfo>-->
            <nav>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Rename modal to qeue names -->
                        <modal :content="indexContent"></modal>
                    </div>

                    <div class="col-md-6">
                        <ticketCount :content="indexContent"> </ticketCount>
                    </div>
                </div>
            </nav>
        </div>

        <div>
            <div class="container searchBar">
                <div class="row">
                    <div class="col">
                        <input type="text" v-model="searchTicket" />
                        <button
                            @click="search()"
                            type="submit"
                            class="btn btn-primary"
                        >
                            Search
                        </button>
                        <button
                            @click="showAll()"
                            type="submit"
                            class="btn btn-primary"
                        >
                            Show All
                        </button>
                    </div>
                </div>
            </div>

            <div class="container mainContent">
                <headerInfo></headerInfo>

                <alltickets :content="indexContent"></alltickets>
            </div>

            <div class="col pagecount">
                <Paginator :paginator="paginator"></Paginator>
              
            </div>
        </div>
    </div>
</template>

<script>
import GlobalComponents from "@/Components/components.js";

export default {
    components: {
       ...GlobalComponents,
    },

    props: {
        qeue: Array,
        allTicketInfo: Array,
        Ticket: Object,
        paginator: Object,
    },

    data() {
        return {
            searchTicket: "",
            indexContent: {
                a: this.qeue,
                b: this.Ticket,
                c: this.allTicketInfo,  
            },
        };
    },

    methods: {

   
        search() {
            window.location.href = `/api/list/search?q=${this.searchTicket}`;
        },

        showAll() {
            window.location.href = `/api/list/`;
        },
    },
};
</script>

<style scoped>
@import "~bootstrap/dist/css/bootstrap.css";
@import "../../css/MediaQ.css";
</style>
