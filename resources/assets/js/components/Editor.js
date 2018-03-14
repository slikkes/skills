import marked from 'marked';

export default {
    template: `
        <div :id="editor">
            <textarea v-model="input" debounce="300"></textarea>
            <div class="editorview" v-html="input | marked"></div>
        </div>
    `,
    data() {
        return { input: '# Hello!' }
    },
    filters: {
        marked: marked
    }
}