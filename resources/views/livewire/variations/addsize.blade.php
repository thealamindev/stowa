<div>
    <div class="row">
        <div class="col-lg-6">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
             @endif
            <form wire:submit.prevent="size_insert">

                <div class="form-group">
                  <label>Add Size Variations</label>
                  <input type="text" class="form-control" wire:model="size" >
                </div>

                <button type="submit" class="btn btn-primary">Add Size</button>
              </form>
        </div>
        <div class="col-lg-5">
           <div class="card">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Size</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($sizes as $size )
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$size->size}}</td>
                        <td>
                            <button class="btn btn-danger btn-sm"   wire:click="delete_size({{$size->id}})">Delete</button>
                        </td>
                      </tr>
                    @endforeach



                </tbody>
              </table>
           </div>
        </div>
       </div>
</div>
