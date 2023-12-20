<div>
    {{-- In work, do what you enjoy. --}}

    <div class="row">
        <div class="col-lg-6">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
             @endif
            <form wire:submit.prevent="color_insert">

                <div class="form-group">
                  <label>Add Color Variations</label>
                  <input type="text" class="form-control" wire:model="color" >
                  <div>@error('color') {{ $message }} @enderror</div>
                </div>
                <div class="form-group">
                  <label>Add Color Code</label>
                  <input type="color" class="form-control" wire:model="code" >
                  <div>@error('code') {{ $message }} @enderror</div>
                </div>

                <button class="btn btn-primary">Add color</button>
              </form>
        </div>
        <div class="col-lg-5">
           <div class="card">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Color</th>
                    <th scope="col">Color Code</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                    @foreach ($colors as $color )
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$color->color}}</td>
                        <td>
                            <span style="background:{{$color->color_code}}; color: #fff; height:70px; width:70px;">
                                {{$color->color_code}}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" wire:click="editColor({{ $color->id }})" data-toggle="modal" data-target="#editColor{{ $color->id }}">Edit</button>
                            <!-- Button trigger modal -->

                            <div wire:ignore.self class="modal fade" id="editColor{{ $color->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-12">
                                            @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                                @endif
                                            <form wire:submit.prevent="updateColor({{ $color->id }})">

                                                <div class="form-group">
                                                    <label>Update Color Variations</label>
                                                    <input type="text" class="form-control" wire:model="color">
                                                </div>
                                                <div class="form-group">
                                                    <label>Update Color Code</label>
                                                    <input type="color" class="form-control" wire:model="code">
                                                </div>

                                                <button class="btn btn-primary">Update color</button>
                                                </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </td>
                      </tr>
                    @endforeach



                </tbody>
              </table>
           </div>
        </div>
       </div>
</div>
