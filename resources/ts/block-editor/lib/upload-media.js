/**
 * WordPress dependencies
 */
 import { Component } from '@wordpress/element';
 
 // The media library image object contains numerous attributes
 // we only need this set to display the image in the library.
 const slimImageObject = ( img ) => {
     const attrSet = [
         'sizes',
         'mime',
         'type',
         'subtype',
         'id',
         'url',
         'alt',
         'link',
         'caption',
     ];
     return attrSet.reduce( ( result, key ) => {
         if ( img?.hasOwnProperty( key ) ) {
             result[ key ] = img[ key ];
         }
         return result;
     }, {} );
 };
 
 class MediaUpload extends Component {
     constructor( {
         modalClass,
         title = 'Select Media',
     } ) {
         super( ...arguments );
         const { onSelect } = this.props;
         this.openModal = this.openModal.bind( this );
         this.onOpen = this.onOpen.bind( this );
         this.onClose = this.onClose.bind( this );

         this.frame = document.createElement('dialog');
         this.frame.classList.add(modalClass);
         var heading = document.createElement('h3');
         heading.innerHTML = title;

         this.frame.appendChild(heading);
         var form = document.createElement('form');
         form.setAttribute('method', 'dialog');
         this.frame.addEventListener('close', () => {
             if (this.frame.returnValue == 'submit') {
                 onSelect(slimImageObject(JSON.parse(new FormData(form).get('image'))));
             }
         }, false)
         this.frame.append(form);
         this.list = document.createElement('div');
         form.appendChild(this.list);
         var button = document.createElement('input');
         button.setAttribute('type', 'submit');
         button.setAttribute('value', 'submit');
         form.appendChild(button);
         var button = document.createElement('input');
         button.setAttribute('type', 'submit');
         button.setAttribute('value', 'cancel');
         form.appendChild(button);
         document.body.appendChild(this.frame);
     }
 
  
     componentWillUnmount() {
         this.frame.close();
     }

     onOpen() {
         const { value } = this.props;         
         this.updateCollection();
     }
 
     onClose() {
         const { onClose } = this.props;
 
         if ( onClose ) {
             onClose();
         }
     }
 
     updateCollection() {
        const url = new URL('/laraberg/media-library', window.location.origin)    
   
        var res = fetch(url.toString()).then(response => 
            response.json()
        ).then(json => {
            this.list.innerHTML = '';
            json["media-library"].forEach(j => {
                var img = document.createElement('input')
                this.list.appendChild(img)
                img.setAttribute('type', 'radio');
                img.setAttribute('name', 'image');
                img.setAttribute('value', JSON.stringify(j));
                img.style.backgroundImage = `url(${j.url})`;
                img.style.width = "200px";
                img.style.height = "200px";
                img.style.appearance = "none";
                img.style.backgroundSize = "contain";
                img.style.backgroundRepeat = "no-repeat";
                img.style.backgroundPosition = "center";
            })
        })
     }
 
     openModal() {
         this.frame.showModal();
         this.onOpen();
     }
 
     render() {
         return this.props.render( { open: this.openModal } );
     }
 }
 
 export default MediaUpload;
 