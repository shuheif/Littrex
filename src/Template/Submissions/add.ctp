<?php
/**
  * @var \App\View\AppView $this
  */
?>
<style>

      .container
      {
        width: 100%;
        max-width: 680px; /* 800 */
        height: 325px;
        text-align: center;
        margin: 0 auto;
      }

        .container h1
        {
          font-size: 42px;
          font-weight: 300;
          color: #0f3c4b;
          margin-bottom: 40px;
        }
        .container h1 a:hover,
        .container h1 a:focus
        {
          color: #39bfd3;
        }

        .container nav
        {
          margin-bottom: 40px;
        }
          .container nav a
          {
            border-bottom: 2px solid #c8dadf;
            display: inline-block;
            padding: 4px 8px;
            margin: 0 5px;
          }
          .container nav a.is-selected
          {
            font-weight: 700;
            color: #39bfd3;
            border-bottom-color: currentColor;
          }
          .container nav a:not( .is-selected ):hover,
          .container nav a:not( .is-selected ):focus
          {
            border-bottom-color: #0f3c4b;
          }

        .container footer
        {
          color: #92b0b3;
          margin-top: 40px;
        }
          .container footer p + p
          {
            margin-top: 1em;
          }
          .container footer a:hover,
          .container footer a:focus
          {
            color: #39bfd3;
          }

        .box
        {
          font-size: 1.25rem; /* 20 */
          background-color: #c8dadf;
          position: relative;
          padding: 100px 20px;
        }
        .box.has-advanced-upload
        {
          outline: 2px dashed #92b0b3;
          outline-offset: -10px;

          -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
          transition: outline-offset .15s ease-in-out, background-color .15s linear;
        }
        .box.is-dragover
        {
          outline-offset: -20px;
          outline-color: #c8dadf;
          background-color: #fff;
        }
          .box__dragndrop,
          .box__icon
          {
            display: none;
          }
          .box.has-advanced-upload .box__dragndrop
          {
            display: inline;
          }
          .box.has-advanced-upload .box__icon
          {
            width: 100%;
            height: 80px;
            fill: #92b0b3;
            display: block;
            margin-bottom: 40px;
          }

          .box.is-uploading .box__input,
          .box.is-success .box__input,
          .box.is-error .box__input
          {
            visibility: hidden;
          }

          .box__uploading,
          .box__success,
          .box__error
          {
            display: none;
          }
          .box.is-uploading .box__uploading,
          .box.is-success .box__success,
          .box.is-error .box__error
          {
            display: block;
            position: absolute;
            top: 50%;
            right: 0;
            left: 0;

            -webkit-transform: translateY( -50% );
            transform: translateY( -50% );
          }
          .box__uploading
          {
            font-style: italic;
          }
          .box__success
          {
            -webkit-animation: appear-from-inside .25s ease-in-out;
            animation: appear-from-inside .25s ease-in-out;
          }
            @-webkit-keyframes appear-from-inside
            {
              from  { -webkit-transform: translateY( -50% ) scale( 0 ); }
              75%   { -webkit-transform: translateY( -50% ) scale( 1.1 ); }
              to    { -webkit-transform: translateY( -50% ) scale( 1 ); }
            }
            @keyframes appear-from-inside
            {
              from  { transform: translateY( -50% ) scale( 0 ); }
              75%   { transform: translateY( -50% ) scale( 1.1 ); }
              to    { transform: translateY( -50% ) scale( 1 ); }
            }

          .box__restart
          {
            font-weight: 700;
          }
          .box__restart:focus,
          .box__restart:hover
          {
            color: #39bfd3;
          }

          .js .box__file
          {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
          }
          .js .box__file + label
          {
            max-width: 80%;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: pointer;
            display: inline-block;
            overflow: hidden;
          }
          .js .box__file + label:hover strong,
          .box__file:focus + label strong,
          .box__file.has-focus + label strong
          {
            color: #39bfd3;
          }
          .js .box__file:focus + label,
          .js .box__file.has-focus + label
          {
            outline: 1px dotted #000;
            outline: -webkit-focus-ring-color auto 5px;
          }
            .js .box__file + label *
            {
              /* pointer-events: none; */ /* in case of FastClick lib use */
            }

          .no-js .box__file + label
          {
            display: none;
          }

          .no-js .box__button
          {
            display: block;
          }
          .box__button
          {
            font-weight: 700;
            color: #e5edf1;
            background-color: #39bfd3;
            display: none;
            padding: 8px 16px;
            margin: 40px auto 0;
          }
            .box__button:hover,
            .box__button:focus
            {
              background-color: #0f3c4b;
            }
</style>

<section style="padding-top: 15px;">
  <nav class="navbar navbar-default">
          <h3 style="margin: 20px 0px 0px 25px">Submit - <?= h($assignment->title) ?></h3>
        <div class="container-fluid action-bar" style="padding-left: 11px; padding-top:-5px;">
            <ul class="nav navbar-nav action-bar">
            <li><?= $this->Html->link(h($course->department . $course->number . ' ' . $course->title), ['controller' => 'Courses', 'action' => 'view', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(__('Assignments List'), ['controller' => 'Assignments', 'action' => 'courseAssignments', $course->id], ['class' => 'action-bar-before']) ?></li>
            <li><?= $this->Html->link(h($assignment->title), ['controller' => 'Assignments', 'action' => 'view', $assignment->id], ['class' => 'action-bar-before']) ?></li>
            </ul>
        </div><!--/.container-fluid -->
      </nav>
</section>

 <div class="container" role="main">
  <form method="post" action="https://css-tricks.com/examples/DragAndDropFileUploading//?" enctype="multipart/form-data" novalidate="" class="box has-advanced-upload">
    
    <div class="box__input">
      <svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"></path></svg>
      <label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
      <button type="submit" class="box__button">Upload</button>
    </div>
    
    <div class="box__uploading">Uploading…</div>
    <div class="box__success">Done! <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?" class="box__restart" role="button">Upload more?</a></div>
    <div class="box__error">Error! <span></span>. <a href="https://css-tricks.com/examples/DragAndDropFileUploading//?" class="box__restart" role="button">Try again!</a></div>
  <input type="hidden" name="ajax" value="1"></form>
  </div>

<section class="content">
<div class="submissions form large-9 medium-8 columns content">
    <?= $this->Form->create($submission, ['type' => 'file']) ?>
    <fieldset>
        <?php
            echo $this->Form->hidden('assignment_id', ['value' => $assignment->id]);
            echo $this->Form->hidden('user_id', ['value' => $auth->user('id')]);
            echo $this->Form->input('comment');
            echo $this->Form->input('attachment', ['type' => 'file', 'emtpy' => true]);
        ?>
    </fieldset>

</div>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

</section>

<script>
  'use strict';

  ;( function ( document, window, index )
  {
    // feature detection for drag&drop upload
    var isAdvancedUpload = function()
      {
        var div = document.createElement( 'div' );
        return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
      }();


    // applying the effect for every form
    var forms = document.querySelectorAll( '.box' );
    Array.prototype.forEach.call( forms, function( form )
    {
      var input    = form.querySelector( 'input[type="file"]' ),
        label    = form.querySelector( 'label' ),
        errorMsg   = form.querySelector( '.box__error span' ),
        restart    = form.querySelectorAll( '.box__restart' ),
        droppedFiles = false,
        showFiles  = function( files )
        {
          label.textContent = files.length > 1 ? ( input.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', files.length ) : files[ 0 ].name;
        },
        triggerFormSubmit = function()
        {
          var event = document.createEvent( 'HTMLEvents' );
          event.initEvent( 'submit', true, false );
          form.dispatchEvent( event );
        };

      // letting the server side to know we are going to make an Ajax request
      var ajaxFlag = document.createElement( 'input' );
      ajaxFlag.setAttribute( 'type', 'hidden' );
      ajaxFlag.setAttribute( 'name', 'ajax' );
      ajaxFlag.setAttribute( 'value', 1 );
      form.appendChild( ajaxFlag );

      // automatically submit the form on file select
      input.addEventListener( 'change', function( e )
      {
        showFiles( e.target.files );

        
        triggerFormSubmit();

        
      });

      // drag&drop files if the feature is available
      if( isAdvancedUpload )
      {
        form.classList.add( 'has-advanced-upload' ); // letting the CSS part to know drag&drop is supported by the browser

        [ 'drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop' ].forEach( function( event )
        {
          form.addEventListener( event, function( e )
          {
            // preventing the unwanted behaviours
            e.preventDefault();
            e.stopPropagation();
          });
        });
        [ 'dragover', 'dragenter' ].forEach( function( event )
        {
          form.addEventListener( event, function()
          {
            form.classList.add( 'is-dragover' );
          });
        });
        [ 'dragleave', 'dragend', 'drop' ].forEach( function( event )
        {
          form.addEventListener( event, function()
          {
            form.classList.remove( 'is-dragover' );
          });
        });
        form.addEventListener( 'drop', function( e )
        {
          droppedFiles = e.dataTransfer.files; // the files that were dropped
          showFiles( droppedFiles );

          
          triggerFormSubmit();

                  });
      }


      // if the form was submitted
      form.addEventListener( 'submit', function( e )
      {
        // preventing the duplicate submissions if the current one is in progress
        if( form.classList.contains( 'is-uploading' ) ) return false;

        form.classList.add( 'is-uploading' );
        form.classList.remove( 'is-error' );

        if( isAdvancedUpload ) // ajax file upload for modern browsers
        {
          e.preventDefault();

          // gathering the form data
          var ajaxData = new FormData( form );
          if( droppedFiles )
          {
            Array.prototype.forEach.call( droppedFiles, function( file )
            {
              ajaxData.append( input.getAttribute( 'name' ), file );
            });
          }

          // ajax request
          var ajax = new XMLHttpRequest();
          ajax.open( form.getAttribute( 'method' ), form.getAttribute( 'action' ), true );

          ajax.onload = function()
          {
            form.classList.remove( 'is-uploading' );
            if( ajax.status >= 200 && ajax.status < 400 )
            {
              var data = JSON.parse( ajax.responseText );
              form.classList.add( data.success == true ? 'is-success' : 'is-error' );
              if( !data.success ) errorMsg.textContent = data.error;
            }
            else alert( 'Error. Please, contact the webmaster!' );
          };

          ajax.onerror = function()
          {
            form.classList.remove( 'is-uploading' );
            alert( 'Error. Please, try again!' );
          };

          ajax.send( ajaxData );
        }
        else // fallback Ajax solution upload for older browsers
        {
          var iframeName  = 'uploadiframe' + new Date().getTime(),
            iframe    = document.createElement( 'iframe' );

            $iframe   = $( '<iframe name="' + iframeName + '" style="display: none;"></iframe>' );

          iframe.setAttribute( 'name', iframeName );
          iframe.style.display = 'none';

          document.body.appendChild( iframe );
          form.setAttribute( 'target', iframeName );

          iframe.addEventListener( 'load', function()
          {
            var data = JSON.parse( iframe.contentDocument.body.innerHTML );
            form.classList.remove( 'is-uploading' )
            form.classList.add( data.success == true ? 'is-success' : 'is-error' )
            form.removeAttribute( 'target' );
            if( !data.success ) errorMsg.textContent = data.error;
            iframe.parentNode.removeChild( iframe );
          });
        }
      });


      // restart the form if has a state of error/success
      Array.prototype.forEach.call( restart, function( entry )
      {
        entry.addEventListener( 'click', function( e )
        {
          e.preventDefault();
          form.classList.remove( 'is-error', 'is-success' );
          input.click();
        });
      });

      // Firefox focus bug fix for file input
      input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
      input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });

    });
  }( document, window, 0 ));

</script>
