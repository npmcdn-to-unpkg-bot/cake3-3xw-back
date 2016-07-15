Vue.component('tasks-component',{
   template:'#tasks-list',
   data:function(){
      return{
         list:[],
         newtask:"add a task",
         selected_id:""
      }
   },
   created(){
      this.fetchProjects();
   },
   methods: {
      fetchProjects: function(){
         var resource = this.$resource("tasks.json");
         resource.get(function(tasks){
            this.list = tasks
         }.bind(this))
      },
      deleteProject: function(project){
         this.list.$remove(project);
      },
      addTodo: function (user_id) {
         var resource = this.$resource('tasks/add.json');
         resource.save({name:this.newtask , user_id:user_id}).then((response) => {
            // success callback
            this.newtask = '';
            this.fetchProjects();
         }, (response) => {
            // error callback
            console.log(response)
         });
      },
      deleteTask: function(selected){
         var resource = this.$resource('tasks/delete/'+selected.id +'.json');
         resource.delete().then((response) => {
            // success callback
            //this.fetchProjects();
            this.fetchProjects()
         }, (response) => {
            // error callback
            console.log(response)
         });
      },
      finishTask: function(selected){
         //console.log(selected.id)/*
         var resource = this.$resource('tasks/edit/'+selected.id +'.json');
         resource.update({finished: !selected.finished}).then((response) => {
            // success callback
            //this.fetchProjects();
            this.fetchProjects()
         }, (response) => {
            // error callback
            console.log(response)
         });

      }
   }
});

var vm = new Vue({
   el:'#tasks'
});
