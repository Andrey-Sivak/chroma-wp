'use strict';

class CheckEmpty extends Error {
    constructor( message ) {
        super( message );
        this.name = 'CheckEmpty';
    }
}

class NameValidationError extends Error {
    constructor( message ) {
        super( message );
        this.name = 'NameValidationError';
    }
}

class CheckLength extends Error {
    constructor( message ) {
        super( message );
        this.name = 'CheckLength';
    }
}

class CheckEmail extends  Error {
    constructor( message ) {
        super( message );
        this.name = 'CheckEmail';
    }
}

class CheckPhone extends  Error {
    constructor( message ) {
        super( message );
        this.name = 'CheckPhone';
    }
}

class Validation {
    constructor( options ) {
        this.submitBtn = document.getElementById(options.submitBtn);
        this.inputs = {
            lastName: document.getElementById(options.lastName),
            firstName: document.getElementById(options.firstName),
            phone: document.getElementById(options.phone),
            email: document.getElementById(options.email),
        };

        this.promocode = false;
        this.subscription = '';

        this.success = false;
    }

    checkEmpty( inputValue ) {
        if( inputValue === '' ) {
            throw new CheckEmpty( 'Это поле обязательно для заполнения' );
        }

        return inputValue;
    }

    checkLength( inputValue, minLength, maxLength ) {
        const inputLength = inputValue.length;

        if( inputLength < minLength ) {
            throw new CheckLength( `Поле должно содержать не менее ${minLength} символов` );
        }
        if( inputLength > maxLength ) {
            throw new CheckLength( `Количество символов превышает ${maxLength}. Введите корректные данные` );
        }

    }

    checkName( input ) {
        const inputValue = input.value;

        this.checkEmpty( inputValue );
        this.checkLength( inputValue, 2, 50 );

        const regExp = /^[a-zA-Z]+$/;

        if( !regExp.test( inputValue ) ) {
            throw new NameValidationError( 'Допустимы только буквы английского алфавита' );
        }

        return inputValue;
    }

    checkPhone( input ) {
        const inputValue = input.value;

        this.checkEmpty( inputValue );

        const numberLength = 16;
        const regExp = /\+1\(\d{3}\)\d{3}-\d{2}-\d{2}/;

        if( !regExp.test( inputValue ) || inputValue.length !== numberLength ) {
            throw new CheckPhone( 'Некорректный номер телефона' );
        }

        return inputValue;
    }

    maskPhone( input ) {
        new IMask( input, {
            mask: '+{1}(000)000-00-00',
        });
    }

    checkEmail( input ) {
        const inputValue = input.value;

        this.checkEmpty( inputValue );
        this.checkLength( inputValue, 3, 50);

        const regExp = /^[\w]{1}[\w-\.]*@[\w-]+\.[a-z]{2,4}$/i;

        if( !regExp.test(inputValue) ) {
            throw new CheckEmail( 'Некорректный формат Email' );
        }

        return inputValue;
    }

    createWarningMessage(  message ) {
        const paragraph = document.createElement('p');
        paragraph.className = 'warning';
        paragraph.innerHTML = message;
        return paragraph;
    }

    catchErrors( input, e, ...args ) {
        for( const argsItem of args ) {
            if( e instanceof argsItem ) {
                const messageElement = this.createWarningMessage( e.message );
                input.parentElement.appendChild( messageElement );
                input.classList.add('warn');
            }
        }
    }

    check() {

        const errors = [];

        for( const input in this.inputs ) {
            const elem = this.inputs[input];

            if( !elem ) {
                continue;
            }

            switch( input ) {
                case 'firstName':
                    try {
                        this.checkName( elem );
                    } catch (e) {
                        this.catchErrors( elem, e, CheckEmpty, CheckLength, NameValidationError );
                        errors.push(e);
                    }
                    break;
                case 'lastName':
                    try {
                        this.checkName( elem );
                    } catch (e) {
                        this.catchErrors( elem, e, CheckEmpty, CheckLength, NameValidationError );
                        errors.push(e);
                    }
                    break;
                case 'phone':
                    try {
                        this.checkPhone( elem );
                    } catch (e) {
                        this.catchErrors( elem, e, CheckEmpty, CheckPhone );
                        errors.push(e);
                    }
                    break;
                case 'email':
                    try {
                        this.checkEmail( elem );
                    } catch (e) {
                        this.catchErrors( elem, e, CheckEmpty, CheckLength, CheckEmail );
                        errors.push(e);
                    }
                    break;
            }
        }

        if( errors.length === 0 ) {
            this.success = true;
        }
    }

    init() {
        this.maskPhone( this.inputs.phone );
        this.submitBtn.addEventListener('click',  (e) => {
            e.preventDefault();

            const warningMessages = document.getElementsByClassName('warning');
            let invalidInputs = document.getElementsByClassName('warn');

            if( warningMessages[0] ) {
                while( warningMessages.length ) {
                    warningMessages[0].parentNode.removeChild( warningMessages[0] );
                }
            }

            if( invalidInputs ) {
                invalidInputs = Array.prototype.slice.call(invalidInputs);
                for( let i = 0, length = invalidInputs.length; i < length; i++ ) {
                    if( invalidInputs[i].classList.contains('warn') ) {
                        invalidInputs[i].classList.remove('warn');
                    }
                }
            }


            this.check();
        });

        return this.success;
    }
}

export { Validation };