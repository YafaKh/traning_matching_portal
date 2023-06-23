<nav class="navbar navbar-expand-md bg-dark-blue  txt-sm">
  <div class="container-fluid px-5">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link text-light @yield('activity1')" aria-current="page" 
          href="{{route('hr_list_trainees', ['company_id' => $company_id, 'user_id'=>$user->id])}}"
          >Our trainees</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity2')" aria-current="page" 
          href="{{route('hr_university_students', ['company_id' => $company_id, 'user_id'=>$user->id])}}"
          >University students</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-light @yield('activity3')" aria-current="page" 
          href="{{route('hr_manage_trainings', ['company_id' => $company_id, 'user_id'=>$user->id])}}"
          >Assign trainings</a>
        </li>
      </ul>

      <form class="input-group w-auto h-50" role="searprimarych">
        <input class="form-control txt-sm h-50 border border-secondary" type="search" placeholder="Search Name" id="search">
        <button class="btn btn-sm bg-sand btn-outline-secondary py-0" type="submit">
        <i class="bi bi-search txt-xsm"></i>
        </button>
      </form>
    </div>
  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){  
        $('#search').keyup(function(){  
          tableSearch($(this).val());  
        });  
        function tableSearch(value){  
            $('#table tbody tr').each(function(){  
                  var found = 'false';  
                  $(this).each(function(){  
                      if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                      {  
                            found = 'true';  
                      }  
                  });  
                  if(found == 'true')  
                  {  
                      $(this).show();  
                  }  
                  else  
                  {  
                      $(this).hide();  
                  }  
            });  
        }  
  });  
</script>
