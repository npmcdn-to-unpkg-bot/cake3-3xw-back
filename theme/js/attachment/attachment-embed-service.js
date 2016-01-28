/***
 *    ________
 *    \_____  \___  _____  _  __
 *      _(__  <\  \/  /\ \/ \/ /
 *     /       \>    <  \     /
 *    /______  /__/\_ \  \/\_/
 *           \/      \/
 *
 *  a 3xw sàrl application, made by awallef ( https://github.com/awallef )
 *  copyright 3xw sàrl Switzerland
 */
(function(scope) {

    if (null == scope)
        scope = window;

    if (scope.AttachmentEmbedService)
        return;

    /***
     *    _________                __                .__  .__
     *    \_   ___ \  ____   _____/  |________  ____ |  | |  |   ___________
     *    /    \  \/ /  _ \ /    \   __\_  __ \/  _ \|  | |  | _/ __ \_  __ \
     *    \     \___(  <_> )   |  \  |  |  | \(  <_> )  |_|  |_\  ___/|  | \/
     *     \______  /\____/|___|  /__|  |__|   \____/|____/____/\___  >__|
     *            \/            \/                                  \/
     */
    var Process = {
        INIT_UI                 : 'INIT_UI_EMBED'
    };

    var Notification = {
        ADD_UI_LISTENERS        : 'ADD_UI_LISTENERS_EMBED',
        POST_EMBED              : 'POST_EMBED'
    };

    /* AddUIListeners
     *******************************************/
    function AddUIListeners( note )
    {
        better.AbstractCommand.call(this, note );
    };

    AddUIListeners.prototype = new better.AbstractCommand;
    AddUIListeners.prototype.constructor = AddUIListeners;

    AddUIListeners.prototype.execute = function( notification )
    {
        this.facade.registerEventHandler( 'embed-submit', $('#attachment-embed-submit').get(0), 'click', {
            name: Notification.POST_EMBED,
            body: null,
            type: null
        }, false, true );

        this.nextCommand();
    };

    /* PostEmbed
     *******************************************/
    function PostEmbed( note )
    {
        better.AbstractCommand.call(this, note );
    };

    PostEmbed.prototype = new better.AbstractCommand;
    PostEmbed.prototype.constructor = PostEmbed;

    PostEmbed.prototype.execute = function( notification )
    {
        var settings = this.facade.getRessource('settings');
        var url = settings.site_url + 'attachments/upload';

        if( $('#attachment-name').val() == null || $('#attachment-name').val() == '' )
        {
            return alert('Please fill in a name!');
        }
        if( $('#attachment-embed').val() == null || $('#attachment-embed').val() == '' )
        {
            return alert('Please fill in a embed code!');
        }

        // collect data to POST
        var data = {
          name: $('#attachment-name').val(),
          embed: $('#attachment-embed').val()
        };
        // retrieve tags
        var tags = $('#tagsinput').val();
        for( var t in tags )
        {
          data['atags['+t+'][name]'] =  tags[t].trim();
        }
        $('.optional-fields input, .optional-fields textarea, .optional-fields select').each(function(){
          var $input = $(this);
          var value = $input.val();
          if(value)
          {
            data[$input.attr('name')] =  value.trim();
          }
        });


        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: 'json',
            context: this
        })
        .fail( this.fail )
        .done(this.done);

    };

    PostEmbed.prototype.parseError = function( error )
    {
      if(typeof error === 'string' || error instanceof String)
      {
        return error;
      }
      if(typeof error === 'object' || error instanceof Object)
      {
        for(var i in error){
          return '('+i+')'+this.parseError(error[i]);
        }
      }
      return '';
    };

    PostEmbed.prototype.fail = function( )
    {
        alert('Une erreur c\'est produite lors du chargement des données');
    };

    PostEmbed.prototype.done = function( data )
    {
        console.log(data);
        if( data.data.status != 1 ){
          var errorExplained = this.parseError(data.data.errors);
          if(errorExplained == '')
          {
            errorExplained = 'Unknow problem, server refused to save embde code.';
          }
          return alert('Sorry, we encountered problems:\n\n' + errorExplained);
        }

        var file = data.attachment;

        alert('Your file was successfuly uploaded!');

        this.facade.goTo( 'UNLOCK_MODAL' );

        var attachments = this.facade.getRessource( 'attachments');
        attachments.push( file );
        this.facade.setRessource( 'attachments', attachments );

        this.facade.goTo( Notification.CLEAR_LIST );
        this.facade.goTo( 'SHOW_FILES' );

        this.nextCommand();
    };

    /***
     *    ____   ____.__
     *    \   \ /   /|__| ______  _  __
     *     \   Y   / |  |/ __ \ \/ \/ /
     *      \     /  |  \  ___/\     /
     *       \___/   |__|\___  >\/\_/
     *                       \/
     */
    var Mediator = {

    };


    /***
    *      _________                  .__
    *     /   _____/ ______________  _|__| ____  ____
    *     \_____  \_/ __ \_  __ \  \/ /  |/ ___\/ __ \
    *     /        \  ___/|  | \/\   /|  \  \__\  ___/
    *    /_______  /\___  >__|    \_/ |__|\___  >___  >
    *            \/     \/                    \/    \/
    */
    function Service(facade, name, configObject)
    {
        better.AbstractService.call(this, facade, name, configObject);
    }

    Service.prototype = new better.AbstractService;
    Service.prototype.constructor = Service;

    Service.prototype.initProxies = function(configObject) {
    };
    Service.prototype.initMediators = function(configObject) {

    };

    Service.prototype.initCommands = function(configObject) {
        this.facade.registerCommand( Notification.ADD_UI_LISTENERS, AddUIListeners );
        this.facade.registerCommand( Notification.POST_EMBED, PostEmbed );
    };

    Service.prototype.initProcesses = function(configObject) {

        this.facade.registerProcess( Process.INIT_UI, [
            Notification.ADD_UI_LISTENERS
            ]);
    };

    Service.prototype.runInstall = function(configObject) {

    };

    Service.NAME = 'Attachment Embed Service';

    Service.Dictionary = {
        Process         : Process,
        Notification    : Notification,
        Mediator        : Mediator
    };

    scope.better.AttachmentEmbedService = Service;

})( this );
