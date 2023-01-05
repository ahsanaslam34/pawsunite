                <thead>
                <tr>
                    
                <th>ID</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>

                @foreach($categoryArr as $category)
            <tr>
                <td><input type="hidden" id="txtid{{$category->id}}" value="{{$category->id}}">{{$category->id}}</td>
                <td><input type="hidden" id="txtdes{{$category->id}}" value="{{$category->des}}">{{$category->des}}</td>
                <td>{{$category->created_at}}</td>
                 <td>

                                    <div class="d-flex">
                                        <div class="dropdown ms-auto">
                                            <a href="javascript:void(0)" data-bs-toggle="dropdown"
                                               class="btn btn-floating"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a id="{{$category->id}}" class="dropdown-item  btn-edit">Edit</a>
                                                
                                                <a id="{{$category->id}}"  class="dropdown-item btn-delete">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                               
                             </td>
               
            </tr>
           @endforeach
           
           
            </tbody>
