<div class="form-group row">
    <label class="col-sm-4" for="option-{{ $option->id }}">
        {{ $option->name }}
        {{ $option->values()->first()->price ? "+ {$option->values()->first()->price->convertToCurrentCurrency()->format()}" : '' }}
        {!! $option->is_required ? '<span>*</span>' : '' !!}
    </label>

    <div class="col-sm-8">
        <textarea name="options[{{ $option->id }}]" id="option-{{ $option->id }}" rows="5">{{ old("options.{$option->id}") }}</textarea>
    </div>
</div>
