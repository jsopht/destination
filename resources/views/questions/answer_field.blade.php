<script type="text/template" id="answer-tmt">
  <div class="form-group mb-5">
    <input type="text" class="form-control" id="text" placeholder="Ex.: Carne" required>
    <textarea class="form-control mt-2" id="description"  placeholder="Description"></textarea>
    <select multiple class="form-control mt-2 select2-mult" id="countries" required>
      @foreach($countries as $country)
        <option value="{{ $country->id }}">{{ $country->name }}</option>
      @endforeach
    </select>
    {{-- <input type="file" class="form-control mt-2"> --}}
    <a href="#" class="remove-answer btn btn-outline-danger btn-sm mt-2 float-right"><i class="fa fa-trash" aria-hidden="true"></i> Remover</a>
    <div class="clearfix"></div>
  </div>
</script>
