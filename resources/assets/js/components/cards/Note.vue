<template>

    <tr v-bind:id="'noteHolder'+id">
        <td class="skillPoints">
            {{note.skillname}}<br>
            <img  v-for="i in note.level" src="img/set.png" width="19">
            <br><br>
        </td>
    </tr>

</template>

<script>
    export default {
        mounted() {

        },
        props: ['id', 'note']
    }
</script>