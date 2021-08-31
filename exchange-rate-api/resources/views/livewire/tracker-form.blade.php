<div>
   <form wire:submit.prevent="submit">
    <h4>Filtry</h4>

    <fieldset>
        <div class="form-group">
            <label for="exampleInputName">Od daty</label>
            <input type="date" class="form-control" id="fromDate" placeholder="Enter name" wire:model="fromDate">
            @error('fromData') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    
        <div class="form-group">
            <label for="exampleInputEmail">Do daty</label>
            <input type="text" class="form-control" id="toDate" placeholder="Enter name" wire:model="toDate">
            @error('toDate') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    
        
    </fieldset>

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Zastosuj</button>
</form>
</div>
