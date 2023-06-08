<div class="card">
    <div class="card-body">
        <h4 class="header-title">Stock Input</h4>
        <p class="text-muted font-14 mb-4">Masukkan data material.</p>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cameraModal">
            Buka Modal Kamera
          </button>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="itemcode_input" class="col-form-label">Item Code</label>
                    <input class="form-control" type="text" value="" id="itemcode_input">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="partname_input" class="col-form-label">Part Name</label>
                    <input class="form-control" type="text" value="" id="partname_input">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="type_input" class="col-form-label">Type</label>
                    <input class="form-control" type="text" value="" id="type_input">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="quantity_input" class="col-form-label">Quantity</label>
                    <input class="form-control" type="number" value="" id="quantity_input">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="location_input" class="col-form-label">Location</label>
                    <input class="form-control" type="text" value="" id="location_input">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="location_input" class="col-form-label">User</label>
                    <input class="form-control" type="text" value="{{Auth::user()->name}}" id="location_input" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <input class="btn btn-rounded btn-info mb-3" type="submit" value="Submit" onclick="submit()">
            </div>
        </div>
    </div>
</div>
