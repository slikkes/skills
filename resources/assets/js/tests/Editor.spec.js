//Test file "editor.spec.js"

import Editor from '../components/Editor.js';

describe('Editor', ()=>{
    it('should set correct default data', function(){
        expect(typeof Editor.data).toBe('function')
        var defaultData=Editor.data()
        expect(defaultData.input).toBe('# Hello!')
    });
});
