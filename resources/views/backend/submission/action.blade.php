ment->addition==0)
                                
                                <td><a class="btn btn-success" onclick="return myFunction();" href="/backend/submission/{{ $parameter }}/edit"><i class="tim-icons icon-pencil"></i>Give Comment</a></td>
                                @else
                                @endif
                                @endforeach
                                
                               @if($action->status==0)
                               <form action="/backend/submission/{{ isset($action)? $action->id:0 }}" method="post"  enctype="multipart/form-data">
                                    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
                                    {{csrf_field()}}
                                    {{ method_field('PATCH') }}
                               
                                <td><button class="btn btn-success" name="status" value="1" onclick="return myFunction1();" type="submit"><i class="tim-icons icon-pencil"></i>Select</button></td>
                               </form>
                                @else
                               @endif
                               
                               @else
                               @endif
                              
                               <!-- this is written for permission of role_id 3 -->
        
                            </tr>
                            @endforeach
                                        </tbody>
                                        <!-- this is written for table of what kind of submission information will be shown -->
                                        
                                        <tfoot>
                                        <tr>
                                           
                                                <th>Name</th>
                                           
                                                <th>Faculty</th>  
                                                <th>Article</th>
                                                <th>View Article</th>
                                                <th>Image</th>
                                                <th>Comment</th>
                                                <th>Academic Year</th>
                                                <th>Status</th>
                                                <th>Submission_Date</th>
                                                <th>Updated at</th>
                                                @if(Auth::user()->role_id==3)
                                                <th>Action</th>
                                                <th>Action</th>    
                                                @else
                                                
                                                @endif
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                                 </div>
                    <!-- ============================================================== -->
                    <!-- end data table  -->
                    <!-- ============================================================== -->
            

<script>
    function myFunction() {
        if(!confirm("Are You Sure to update this ?"))
        event.preventDefault();
    }
    
    function myFunction1() {
        if(!confirm("Are You Sure to select this ?"))
        event.preventDefault();
    }
    function myFunction2() {
        if(!confirm("Are You Sure to view this ?"))
        event.preventDefault();
    }
</script>       
@include('layouts.partial.footer')