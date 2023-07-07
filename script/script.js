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
        //FUNZIONE CHE CAMBIA LO STATO DELLA TASK
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
        //FUNZIONE CHE INSERISCE UNA NUOVA TASK
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
        //FUNZIONE CHE CANCELLA UNA TASK
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