<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- Bootstrap --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  
  {{-- jQuery --}}
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  
  {{-- Vuejs for Ajax --}}
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>

  {{-- axios --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
  <title>Abm index</title>
</head>
<body>
  <div id="app">
  <div class="container-fluid" style="margin-top: 15px; padding: 11px;">
      <h4 class="card-title" style="text-decoration: underline;">Users ABM</h4>
      <?php $i = 0; ?>
      @foreach ($abms as $abm)
        ({{$i+=1}}) {{$abm->name}} => {{$abm->age}}
        <br> 
      @endforeach
    </div>
    
    <button class="btn" style="margin-left: 10px; margin-top: 15px;">Toggle</button>
    <hr>
    <div class="container">
      <label for="name">Name</label>
      <input type="text" v-model:text='name' class="form-control" id="name" placeholder="Enter name" name="name" required>
      <br>
      <label for="mobile_no">age</label>
      <input type="text" v-model:text='age' class="form-control" id="age" name="age" placeholder="Age" required>
      <span class="module" @click="store"><a class="btn btn-info" style="margin-top: 17px; margin-bottom: 20px;" href="#">Submit</a></span>
    </div>
  </div>
<script>
    $(document).ready(function (){
      $('.container').hide();
  
      $('button.btn').on('click', function(){
          $('.container').toggle();
      });
    });
  </script>
  
  <script>
    var app = new Vue({
        el: '#app',
        data: {
          name: '',
          age: '',
          url: '{{route("abm.store")}}'
        },
        methods: {
          store: function (){
            let vm = this;
            axios({
              method: 'POST',
              url: vm.url,
              data: {
                name: vm.name,
                age: vm.age
              },
            }).then(function(response){
              vm.name = '';
              vm.age = '';
              $('#app').load('http://127.0.0.1:8000/abm');
              Vue.use(clipboard);
            }).catch(function(error){
              console.log(error)
            });
          }
        }
      });
  </script>
</body>
</html>
