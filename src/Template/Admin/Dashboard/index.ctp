<style>.to-do-list li {cursor: pointer;}</style>
<div id="tasks" class="row">
   <div class="col-md-12">
      <tasks-component></tasks-component>
   </div>
   <template id="tasks-list">
      <section class="panel">
         <header class="panel-heading">
            To Do List <span class="tools pull-right">
               <a href="javascript:;" class="fa fa-chevron-down"></a>
               <a href="javascript:;" class="fa fa-times"></a>
            </span>
         </header>
         <div class="panel-body">
            <div class="" style="position: relative;">
               <input v-model="newtask" v-on:keyup.enter="addTodo" class="form-control">
               <br>
               <ul class="to-do-list ui-sortable" id="" >
                  <li class="clearfix" v-for="task in list.tasks" transition="fade" @click="finishTask(task)">
                     <div class="pull-left">
                        <label for="todo-check" @click="finishTask(task)"></label>
                     </div>
                     <p class="todo-title" v-bind:class="{'line-through': task.finished}">
                        {{task.name}}
                     </p>
                     <div class="todo-actionlist pull-right clearfix">
                        <a href="#" class="todo-remove" @click="deleteTask(task)"><i class="fa fa-times"></i></a>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </section>
   </template>
</div>
<?= $this->Html->script(['vue/vue','vue/vue-resource', 'vue/tasks']) ?>
