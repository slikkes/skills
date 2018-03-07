<template>
    <div id="error">

        <div id="errorMessage">
            <p id="close" @click="close">&times;</p>
            {{message}}
        </div>

    </div>
</template>

<script>
    export default{
        props:['message'],
        methods:{
            close(){
                let err=-1;
                this.$emit('closeError', err);
            }
        }
    }
</script>

<style>
    #error{
        background-color:rgba(0,0,0,.5);
        height:100%;
        width:100%;
        position: absolute;
        z-index:1;
    }
    #errorMessage{
        width:70%;
        height:20%;
        background-color:white;
        margin:130px auto;
        text-align:center;
        color:red;
        font-size:32px;
        font-weight:bold;
    }
    #close{
        margin-top:0;
        font-size:32px;
        text-align:right;
        cursor:pointer;
    }
</style>