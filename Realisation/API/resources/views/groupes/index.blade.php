<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dashboard</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css%22%3E">
<link rel="stylesheet" href="/css/style.css">
<style>
   .col-2 img{
        margin-left: 20px;
        border-radius: 19px;
    }

    .flex{
        display: flex;
        align-items: center;
        margin-left: 190px;
    }
</style>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Groupe</h2></div>

                </div>
                <div class="col-sm-12 d-flex justify-content-between p-3">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('group.create') }}" class="btn btn-primary">+add group</a>
                        
                        <select class="btn btn-secondary dropdown-toggle ml-2" name="filter" id="filter">
                            <option value="">Select formatuer</option>
                            @foreach ($groupes as $value)
                            <option value="{{$value->formateur->Nom_formateur}}">{{$value->formateur->Nom_formateur}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" class="form-control" id="search" placeholder="Search&hellip;">
                    </div>

                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Logo </th>
                        <th>Groupe </th>
                        <th>Formatuer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table1" id="table1">
                    @foreach ($groupes as $group)
                    <tr>
                        <td class="col-2"><img src="{{asset('./img/'.$group->Logo)}}" alt="" width="100" height="80"></td>
                        <td>{{ $group->Nom_groupe}}</td>
                        <td>{{ $group->formateur->Nom_formateur}}</td> 
                        <td class="col-2"> <a  href="{{ route('group.edit', $group->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a></td> 
                        <td>  <a class="btn btn-outline-dark" href="#apprenant">Apprenant</a></td>
                        
                        <td>
                          
                            <form action="{{ route('group.destroy', $group->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button id="trash-icon">
                                    <a  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-start">
                    {!! $groupes->links() !!}
                </div>
                <div>
                    <a href="{{route('generate')}}" class="btn btn-outline-secondary" >Exporter PDF</a>
                    <a href="/exportexcel" class="btn btn-outline-secondary" >Exporter excel</a>
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
                       Impoter data
                      </button>
                 </div>

                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    // $('#filter').on('change',function(){
    //     $value=$(this).val();
    //     $.ajax({
    //         type:'get',
    //         url:'{{route("filter_bief")}}',
    //         data:{'filter':$value},
    //         success:function(data){
    //             console.log(data);
    //             var task=data.dataTask;
    //             var html='';
    //             if(task.length>0){
    //                 for(let i=0;i<task.length;i++){
    //                     html+=`<tr>
    //                                 <td>${task[i]['Nom_tache']}</td>
    //                                 <td>${task[i]['Duree']}</td>
    //                                 <td><a  href="/task/${task[i]['id']}/edit" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
    //                                 <form method="post" action="/task/${task[i]['id']}">
    //                                     <input type="hidden" name="_method" value="Delete">\
    //                                     <input type="hidden" name="_token" value='{{ csrf_token() }}'>
    //                                     <button id="trash-icon" type='submit'>
    //                                 <a  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
    //                             </button></td>
    //                             </tr>`;
    //                 }
    //             }
    //             else{
    //                 html+=`<tr>\
    //                 <td>no tache</td>\
    //                 </tr>`;
    //             }
    //             $('#table1').html(html);
    //         }
    //     });
    // })
    // $('#search').on('keyup',function(){
    //     $value=$(this).val();
    //     $.ajax({
    //         type:'get',
    //         url:'{{route("searchtache")}}',
    //         data:{'searchtask':$value},
    //         success:function(data){
    //             console.log(data);
    //             var task=data.search;
    //             var html='';
    //             if(task.length>0){
    //                 for(let i=0;i<task.length;i++){
    //                     html+=`<tr>
    //                                 <td>${task[i]['Nom_tache']}</td>
    //                                 <td>${task[i]['Duree']}</td>
    //                                 <td><a  href="/task/${task[i]['id']}/edit" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
    //                                 <form method="post" action="/task/${task[i]['id']}">
    //                                     <input type="hidden" name="_method" value="Delete">\
    //                                     <input type="hidden" name="_token" value='{{ csrf_token() }}'>
    //                                     <button id="trash-icon" type='submit'>
    //                                 <a  class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
    //                             </button></td>
    //                             </tr>`;
    //                 }
    //             }
    //             else{
    //                 html+='<tr>\
    //                 <td>no tache</td>\
    //                 </tr>';
    //             }
    //             $('#table1').html(html);
    //         }
    //     })
    // })
    
    </script>
</body>
</html>
