/* global stepcarousel1 */

stepcarousel1.setup({
	galleryid: 'carousel1',  //id of carousel DIV
	beltclass: 'belt1',      //class of inner "belt" DIV containing all the panel DIVs
	panelclass: 'panel1',    //class of panel DIVs each holding content
	autostep: {
            enable:true,
            moveby:1, 
            pause:3000
        },
	panelbehavior:{
            speed:500, 
            wraparound:true, 
            persist:true
        },
	statusvars: ['statusA', 'statusB', 'statusC'], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype: ['external'] //content setting ['inline'] or ['external', 'path_to_external_file']
});