import ReactDOMServer from 'react-dom/server';
import { useEffect, useState, useCallback, ReactElement, JSXElementConstructor } from 'react';
import { TextField, } from '@mui/material';
import MuiAutocomplete from '@mui/material/Autocomplete';

interface AutocompleteProps {
  name: string,
  label: string | ReactElement<any, string | JSXElementConstructor<any>>,
  value: any,
  multiple: boolean,
  required: boolean,
  disabled: boolean,
  onChange: (event: any) => void,
  choices: any,
  error?: boolean,
  helperText?: string
}

const Autocomplete = (props: AutocompleteProps): JSX.Element | null => {

  const { name, label, required, multiple, disabled, onChange, choices, error, helperText } = props;
  const value = props.value || null;

  const [arrayChoices, setArrayChoices] = useState<Array<any>>([]);

  useEffect(
    () => {

      const arrayValue = [];
      for (const idx in choices) {
        arrayValue.push({ value: idx, label: choices[idx] });
      }

      setArrayChoices(arrayValue);

    },
    [choices]
  );

  const onChangeWrapper = useCallback(
    (e: any, option: any) => {

      const selectedValue = multiple
        ? option.map((item: any) => typeof item === 'object' ? item.value : item)
        : option?.value;

      onChange({
        target: {
          name: name,
          value: selectedValue,
        }
      })
    },
    [multiple, onChange, name]
  );

  const getOptionLabel = useCallback(
    (value: any) => {

      if (typeof value !== 'object') {
        value = arrayChoices.find(
          // eslint-disable-next-line
          (option: any) => option.value == value
        );
      }

      if (value?.label && typeof value.label === 'object') {
        return ReactDOMServer.renderToStaticMarkup(
          value.label
        );
      }

      return value?.label || "";
    },
    [arrayChoices]
  );

  const isOptionEqualToValue = useCallback(
    (option: any, value: any): boolean => {
      // eslint-disable-next-line
      if (option.value == value) {
        return true;
      }

      return false;
    },
    []
  );

  const renderInput = useCallback(
    (params: any) => {

      const InputProps = {
        ...params.InputProps,
        notched: true,
      }

      return (
        <TextField
          {...params}
          name={name}
          label={label}
          InputProps={InputProps}
          InputLabelProps={{ shrink: true, required: required }}
          error={error}
          helperText={helperText}
        />
      );
    },
    [name, label, required, error, helperText]
  );

  return (
    <MuiAutocomplete
      value={value}
      multiple={multiple}
      disabled={disabled}
      onChange={onChangeWrapper}
      options={arrayChoices}
      getOptionLabel={getOptionLabel}
      isOptionEqualToValue={isOptionEqualToValue}
      filterSelectedOptions
      renderInput={renderInput}
    />
  );
};

export default Autocomplete;
