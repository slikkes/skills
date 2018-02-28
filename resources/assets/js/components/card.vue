<template>
    <div class="cards" v-bind:id="'card'+id">

        <div class="front">
            <div class="names">
                <em v-bind:id="'fsurname'+id">{{ surname }}</em>
                <em v-bind:id="'ffirstname'+id">{{ firstname }} </em>
            </div>
            point:<em v-bind:id="'point'+id">{{point}}</em><br>
            created:{{created_at}}<br>
            updated:{{updated_at}}<br><br>
        </div>


        <div class="back">

            <div class="bnames" >
                <em v-bind:id="'bsurname'+id">{{surname}}&nbsp; </em>
                <em v-bind:id="'bfirstname'+id" > {{firstname}} </em>
            </div>

            <table v-bind:id="'table'+id">
                    {{n}}<br>
                <note v-for="i in n" id="0" skillname="test" level="3"></note>
            </table>

        </div>

    </div>
</template>



<script>

    export default {
        mounted() {
            console.log('Card mounted.')
        },
        props:['id', 'surname', 'firstname', 'point', 'created_at', 'updated_at','n'],

       /* data:function(){
            return{
                id: id,
                surname: surname,
                firstname: firstname,
                point: point,
                pointid: "point"+id,
                created_at: created_at,
                updated_at: updated_at,


            }
        }*/
    }

</script>





<style scoped>
    /* CSS here
     * by including `scoped`, we ensure that all CSS
     * is scoped to this component!
     */
</style>