<template>

    <table :id="'table'+id">
<!--
       <note v-for="note in nts"  :id="id" :skillname="note.skillname" :level="note.level"></note>-->
        <note v-for="note in nts" :id="id" :note="note"></note>
        <new-note :skills="skills" :id="id" v-on:create-note="createNote"></new-note>
    </table>

</template>

<script>
    import note from './note';
    import NewNote from'./NewNote';
    export default{
        components:{
            note,
            NewNote,
        },
        props:['nts', 'id' 'skills'],
        methods: {
            createNote(msg){
                /* let n='{skillname:\''+this.skills[msg.skill_id]+'\',level:'+msg.level+'}';
                 console.log(n);*/
                this.nts.push({
                    skillname: "aaa",
                    level: msg.level
                });
                console.log(this.nts);

            }
        }
    }

</script>