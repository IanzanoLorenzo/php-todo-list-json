const { createApp } = Vue;

createApp({
    data() {
        return {
            array: '',

        }
    },
    mounted() {
        axios.get('./server.php').then((resp) => {
            this.array = resp.data;
            console.log(this.array)
        })
    },
    methods: {
        doneUndoneTask(index){
            this.array[index].done = !this.array[index].done;
        },
        
        
    },
}).mount('#app')