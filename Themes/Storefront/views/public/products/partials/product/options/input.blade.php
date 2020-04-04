<div class="product-variants-input form-group row {{ $errors->has("options.{$option->id}") ? 'has-error' : '' }}">
    <label class="col-sm-4" for="option-{{ $option->id }}">
        {{ $option->name }}
        {!! $option->values()->first()->price->amount() ? "<span class='value-price'>+ {$option->values()->first()->price->convertToCurrentCurrency()->format()}</span>" : '' !!}
        {!! $option->is_required ? '<span>*</span>' : '' !!}
    </label>

    <div class="col-sm-8">
        <input class="form-control {{ array_pull($attributes, 'class') }}" name="options[{{ $option->id }}]"
            id="option-{{ $option->id }}"
            value="{{ old("options.{$option->id}") }}"
            @foreach ($attributes as $name => $value)
                {{ "{$name}={$value}" }}
            @endforeach
        >

        {!! $errors->first("options.{$option->id}", '<span class="help-block">:message</span>') !!}
    </div>
</div>
