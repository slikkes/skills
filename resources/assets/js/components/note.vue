<template>

    <tr v-bind:id="'noteHolder'+id">
        <td class="skillPoints">
            {{skillname}}<br>
            <img  v-for="i in level" src="img/set.png" width="19">
            <br><br>
        </td>
    </tr>

</template>

<script>
    export default {
        mounted() {
            console.log('note.')
        },
        props: ['id', 'skillname', 'level']
    }
</script>