<template>

    <table :id="'table'+id">
        {{nts}}
        <note v-for="(value, key) in nts"  id="0" :skillname="key" :level="value"></note>
    </table>

</template>

<script>
    import note from './note';
    export default{
        components:{
            note,
        },
        props:['nts', 'id']
    }

</script>