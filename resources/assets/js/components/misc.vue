<div id="app1" >
    <img v-for="i in n" src="img/set.png" width="19">
    <br><input type="range" v-model.number="n" min="1" max="10">
</div>


<script>

    let app1= new Vue({
        el: "#app1",

        data: {

            n: 5
        }
    })

</script>