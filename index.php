<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <div id="app">
        <h1 class="text-center my-5">ToDoList</h1>
        <!-- INSERT NUOVA TASK -->
        <div class="container">
            <div class="row mb-5">
                <div class="col-1 offset-3">
                    <label for="new-task" class="form-label">New Task</label>
                </div>
                <div class="col-4">
                    <input @keyup.enter="newItem()" type="text" class="form-control" id="new-task" v-model="newTask">
                </div>
                <div class="col-2">
                    <div class="btn btn-outline-primary" @click="newItem()">Aggiungi</div>
                </div>
            </div>
        </div>
        <div class="containers">
            <div class="row">
                <div class="col-4 offset-4">
                    <ul class="list-group">
                        <!-- LISTA -->                        
                        <li v-if="array.length > 0" v-for="(item, index) in array" :key="index" class="list-group-item d-flex align-items-center" :class="!item.done ? '' : 'text-decoration-line-through'">
                            <span class="col text-capitalize">{{ item.text }}</span>
                            <div class="col-auto functions-buttons d-flex">
                                <div class="btn me-3" :class="!item.done ? 'btn-outline-success' : 'btn-outline-danger'" @click="doneUndoneTask(index)"><i :class="!item.done ? 'fa-solid fa-check' : 'fa-solid fa-xmark'"></i></div>
                                <div class="btn btn-outline-warning" @click="deleteTask(index)"><i class="fa-solid fa-trash"></i></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="./script/script.js"></script>
</body>
</html>