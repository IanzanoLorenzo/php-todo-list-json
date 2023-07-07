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
            if(this.array[index].done === 'true'){
                this.array[index].done = 'false'
            } else{
                this.array[index].done = 'true'
            }
            this.axiosPost(this.array)
        },
        newItem(){
            console.log(this.array)
            if(this.newTask.trim() !== ''){
                let obj = {
                    text : this.newTask.trim(),
                    done : false
                };
                if(this.array === null){
                    this.array = [];
                }
                this.array.push(obj);
                this.newTask = '';
            }
            this.axiosPost(this.array)
        },
        deleteTask(index){
            if(this.array.length > 1){
                this.array.splice(index, 1)
                this.axiosPost(this.array)
            } else {
                this.array = '';
                this.axiosPost(this.array)
            }
        },
        axiosPost(thearray){
            const data = {
                array : thearray
            };
            axios.post(this.apiUrl, data,{
                headers: {'Content-Type': 'multipart/form-data'}
            }).then((resp) => {
                this.array = resp.data;
            })
        }
        
    },
}).mount('#app');