<!--Ik wilde zo graag niet de pagina refreshen tijdens het zoeken....-->
<!--https://vuejs.org/v2/cookbook/using-axios-to-consume-apis.html-->
<!--https://www.digitalocean.com/community/tutorials/vuejs-rest-api-axios-->
<!--https://jasonwatmore.com/post/2020/07/23/vue-axios-http-get-request-examples-->


<!--CSRF token wordt aangeroepen in view_uploads.blade.php en toegewezen aan webcall via functie in bootstrap.js-->
<template>
    <div class="content">
        <div class="searchbar">
            <b-input-group>
                <b-form-input v-model="query_data" id="searchQuery" placeholder="Search image by name or user">
                </b-form-input>
                <span class="input-group-btn">
                        <button type="button" class="btn btn-default btn-sm" v-on:click="search">
                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd"
                                      d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </button>
                </span>
            </b-input-group>
        </div>

        <b-form-group label="Filter by category:">
            <b-form-checkbox-group
                id="checkbox-group-1"
                v-model="selected"
                :options="options"
                name="flavour-1"
            ></b-form-checkbox-group>
        </b-form-group>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="cs-p-1">Name</th>
                        <th class="cs-p-1">Image</th>
                        <th class="cs-p-1">User</th>
                        <th class="cs-p-1">Date</th>
                        <th class="cs-p-1">Category</th>
                    </tr>
                </thead>
                <tr v-for="image in this.filtered_list">
                    <td class="cs-p-1">{{ image.image_title }}</td>
<!--                    https://flaviocopes.com/how-to-remove-last-char-string-js/-->
                    <td class="cs-p-1"><a :href="imageLink.slice(0, -1) + image.id">View Image</a></td>
                    <td class="cs-p-1">{{ image.name ?image.name:image.user.name }}</td>
                    <td class="cs-p1-">{{image.created_at|changeDate}}</td>
                    <td class="cs-p1-">{{renameCategory(image.image_category)}}</td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SearchComponent",
        data() {
            return {
                query_data: '',
                search_result: [],
                options: [
                    { text: 'Raid', value: 'raid' },
                    { text: 'Achievement', value: 'achievement' },
                    { text: 'Transmogrification', value: 'transmog' },
                    { text: 'Guild Event', value: 'event' },
                    { text: 'Other', value: 'other'}
                ],

                selected: ['raid', 'achievement', 'transmog', 'event', 'other']
            }
        },

/*        Zoekt naar lege string waardoor alle images ingeladen worden op het begin*/
        mounted(){
          this.search();
        },

        props: {
            searchRoute:'',
            imageLink: ''
        },

        methods: {
            search(){
                axios.get(this.searchRoute, {params:{'q':this.query_data}} )
                    .then(result=>{this.search_result=result.data.images})
            },

            renameCategory(category_string){
                if (!category_string || !this.options){
                    return '';
                }
                let result = '';

                this.options.forEach( option=>{
                        if (option.value === category_string) {
                            result = option.text;
                        }
                    }
                )

                return result;
            }
        },

        filters: {
            changeDate(date_string){
                let new_date_string = new Date(date_string);
                return new_date_string.toLocaleDateString('en-GB');
            }

        },

        computed: {
            filtered_list(){
                return this.search_result.filter(image=>{
                    return this.selected.includes(image.image_category)
                })
            }
        }
    }
</script>

<style scoped>

</style>
