const { createApp } = Vue;

createApp({
    data() {
        return {
            array: [],
            newTask: '',
            apiUrl: './server.php'
        };
    },
    mounted() {
        this.array = []
        axios.get(this.apiUrl).then((resp) => {
            this.array = resp.data;
        })
    },
    methods: {
        doneUndoneTask(index){
            const data = {
                IndexChange : index
            };

            axios.post(this.apiUrl, data,{
                headers: {'Content-Type': 'multipart/form-data'}
            }).then((resp) => {
                this.array = resp.data;
            })
        },
        newItem(){
            console.log(this.array)
            if(this.newTask.trim() !== ''){
                if(this.array === null){
                    this.array = [];
                };
                
                const data = {
                    Item : this.newTask
                };

                axios.post(this.apiUrl, data,{
                    headers: {'Content-Type': 'multipart/form-data'}
                }).then((resp) => {
                    this.newTask = '';
                    this.array = resp.data;
                })
            }
        },
        deleteTask(index){
            const data = {
                IndexDelete : index
            };

            axios.post(this.apiUrl, data,{
                headers: {'Content-Type': 'multipart/form-data'}
            }).then((resp) => {
                this.array = resp.data;
            })
        },     
    },
}).mount('#app');