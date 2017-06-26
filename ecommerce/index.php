<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php /*<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <style type="text/css">
        * { padding: 0px;
            margin: 0px;
            
        }
        
        #header{
            margin:auto;
            width: 50px;
            font-family: arial;
        }
        
        ul,ol{
            list-style: none;
        }
        
        
        
        .nav > li{
            float:left;
        }
        
        .nav li a{
            background-color: greenyellow;
            color:black;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        
        .nav li a:hover{
            background-color: gray;
            
        }
        
        
        
        .nav li ul{
            display: none;
            position:relative;
            min-width: 140px;
        }
        
        .nav li:hover > ul{
            display:block;
                
        }
        
        .nav li ul li{
            position: relative;
                
        }
        
        .nav li ul li ul {
            
            right: -150px;
            top: 0px;
        }
            </style>
    </head>
    <body>
        <div id="header">
        <ul class="nav">
            <li><a href="">Categorias</a>
                
                <ul><li><a>Accesorios</a>
                        <ul><li><a>:v</a>
                                                    <ul><li><a>:v</a></li></ul></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                    
                    </li></ul>
                
                <ul><li><a href="">Almacenamiento</a>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>                    
                    
                    </li></ul>
                
                <ul><li><a href="">Audio y Video</a>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                    
                    </li></ul>
                
                <ul><li><a href="">Computadoras</a>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                    
                    </li></ul>
                
                <ul><li><a href="">VideoJuegos</a>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:vretertretretret</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                    
                    </li></ul>
                
                <ul><li><a href="">Pantallas</a>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                        <ul><li><a>:v</a></li></ul>
                    
                    </li></ul>
                
                <ul><li><a href="">Energia</a>
                        <ul><li><a>:vghgjfgjf</a></li></ul>
                        <ul><li><a>:v1</a></li></ul>
                        <ul><li><a>:v2</a></li></ul>
                        <ul><li><a>:v3</a></li></ul>
                    
                    </li></ul>
                
            
            </li>
        </ul>
        </div>
        
        
    </body>
</html>
*/?>
<head>
 <style type="text/css">    
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -6px;
    margin-left: -1px;
    -webkit-border-radius: 0 6px 6px 6px;
    -moz-border-radius: 0 6px 6px;
    border-radius: 0 6px 6px 6px;
}

.dropdown-submenu:hover>.dropdown-menu {
    display: block;
}

.dropdown-submenu>a:after {
    display: block;
    content: " ";
    float: right;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    border-width: 5px 0 5px 5px;
    border-left-color: #ccc;
    margin-top: 5px;
    margin-right: -10px;
}

.dropdown-submenu:hover>a:after {
    border-left-color: #fff;
}

.dropdown-submenu.pull-left {
    float: none;
}

.dropdown-submenu.pull-left>.dropdown-menu {
    left: -100%;
    margin-left: 10px;
    -webkit-border-radius: 6px 0 6px 6px;
    -moz-border-radius: 6px 0 6px 6px;
    border-radius: 6px 0 6px 6px;
}

@media (min-width: 768px) {
    /*added by T Morphy */
/*from http://www.barrykooij.com/bootstrap-submenu-open-on-mouse-over/ to get hover behaviour on desktop */
ul.nav li.dropdown:hover ul.dropdown-menu{ display: block; }
ul.nav li.dropdown:hover ul.dropdown-menu li.dropdown-submenu ul.dropdown-menu {
    display: none;
} 
ul.nav li.dropdown ul.dropdown-menu li.dropdown-submenu:hover ul.dropdown-menu {
    display: block;
} 
  .lead {
    font-size: 21px;
  }
}
  </style>   
</head>

<html>
<nav class="navbar navbar-default navbar-fixed-top sb-slide" role="navigation" style="position:fixed">
			<!-- Left Control -->
			<div class="sb-toggle-left navbar-left hidden-lg hidden-md">
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
				<div class="navicon-line"></div>
			</div><!-- /.sb-control-left -->
			<div class="container-fluid">

      
			<div class="container">
				<!-- Logo -->
				<div class="navbar-header hidden-md">
					<a class="navbar-brand" href="/index.html">stakeholdermap.com</a>
				</div><!-- /#logo -->
				
				<!-- Menu -->
				<ul class="nav navbar-nav">
					<li class="dropdown"><a href="#" title="Stakeholder Mapping in 4 steps" class="dropdown-toggle disabled" data-toggle="dropdown">Stakeholder Map <span class="caret"></span></a>
                    		<ul class="dropdown-menu" role="menu">
                            <li><a href="/what-is-a-stakeholder.html" title="What is a Stakeholder?">What is a Stakeholder?</a></li>
                            <li><a href="/what-are-stakeholders-video.html" title="What are stakeholders? video">What are stakeholders? - video</a></li>
                            <li><a href="/stakeholder-analysis.html" title="Stakeholder Analysis">Stakeholder Analysis</a></li>
                       <li><a href="/stakeholder-definition.html" title="Stakeholder Definition">Stakeholder Definition</a></li>
                       <li><a href="/stakeholder-engagement.html" title="Stakeholder Engagement">Stakeholder Engagement</a></li>
                       <li><a href="/stakeholder-influence.html" title="Stakeholder Influence">Stakeholder Influence</a></li>
                       <li><a href="/stakeholder-management.html" title="Stakeholder Management">Stakeholder Planning</a></li>
                       <li class="dropdown-submenu">
                       			<a href="#" tabindex="-1" class="dropdown-toggle" data-toggle="dropdown">Stakeholder lists</a>
                                <ul class="dropdown-menu">
                                          <li><a href="/stakeholder-list.html" title="Stakeholder List">Stakeholder List - generic</a></li>
                                    <li><a href="/stakeholder-list-big-data.html" title="Big Data stakeholders">Big Data stakeholder list</a></li>
                                      <li class="slast"><a href="/stakeholders-construction.html" title="Construction Stakeholders">Construction stakeholders</a></li>
                                  <li><a href="/stakeholders-ecommerce.html" title="stakeholders ecommerce">eCommerce stakeholder list</a> </li>
                                  <li><a href="/stakeholders-it-project.html" title="stakeholders IT project">IT project stakeholder list</a></li>
                                  </ul>
                                </li><!--end submenu-->
                    <li><a href="/internal-stakeholders.html" title="Internal stakeholders">Internal Stakeholders</a></li>
               <li><a href="/stakeholder-prezi.html" title="Prezi presentation on stakeholder management">Stakeholder Prezi</a></li>
               <li><a href="/project-stakeholders.html" title="Project Stakeholders">Project Stakeholders</a></li>
               	<li><a href="/stakeholder-theory.html" title="stakeholder-theory">Stakeholder Theory</a></li>
                    	<li><a href="/stakeholder-theory-what-next.html" title="stakeholder theory what's next">What next for Stakeholder Theory?</a></li>
         
                   <li><a href="/communication-cultural-assumptions.html" title="Culture in Business Communication">Culture in Business Communication</a></li>
               <li><a href="/importance-stakeholder-management.html" title="Importance of Stakeholder Management">Importance of Stakeholders</a></li>
                  <li><a href="/engaging-stakeholders.html" title="Engaging Stakeholders - 5 ideas">5 ways to Engage Stakeholders</a></li>
                        </ul>
                        </li>
					<li class="dropdown"><a class="dropdown-toggle disabled" data-toggle="dropdown" href="#" title="Stakeholder Analysis">Stakeholder Analysis <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                    <li><a href="/stakeholder-analysis.html" title="Stakeholder Analysis">Stakeholder Analysis - how to</a></li>
                   <li> <a href="/stakeholder-analysis/stakeholder-analysis-basic-method.html" title="Stakeholder Analysis Basic Method">Basic Stakeholder Analysis method</a></li>
                     <li><a href="/stakeholder-analysis/stakeholder-analysis-example.html" title="Example Stakeholder Analysis">Example Stakeholder Analysis</a></li>
               <li><a href="/stakeholder-analysis/Stakeholder-Analysis-keyplayers.html" title="Stakeholders Key Players">Key Players</a></li>
               <li><a href="/stakeholder-analysis.html" title="Power Interest Stakeholder Analysis">Power interest matrix</a></li>
               <li><a href="/stakeholder-matrix.html" title="an overview of stakeholder matrices">Stakeholder Matrices</a></li>
                 <li><a href="/stakeholder-mindmap.html" title="Stakeholder Mind Map for a software project">Stakeholder Mind Map</a></li>
                 <li><a href="/stakeholder-analysis/stakeholder-analysis-displeasure-list.html" title="Keeping stakeholders happy">Happy Stakeholders</a></li>
                 <li><a href="/stakeholder-power.html" title="stakeholder power">Stakeholder Power</a></li>
                <li><a href="/stakeholder-analysis/stakeholder-salience.html" title="Stakeholder Salience">Stakeholder Salience</a></li>
                   <li><a href="/stakeholder-analysis/stakeholder-analysis-software.html" title="stakeholder analysis software">Stakeholder Analysis Software</a></li>
                         <li><a href="/stakeholder-SWOT.html" title="Stakeholder SWOT">Stakeholder SWOT</a></li>
                   <li><a href="/stakeholder-analysis/stakeholder-analysis-video.html" title="Stakeholder Analysis video tutorial">Stakeholder Analysis Video</a></li>
                    </ul>
                    </li>
					<li><a href="/stakeholder-management-templates.html" title="Stakeholder Templates">Stakeholder Map Templates</a></li>
                          <li class="dropdown"><!--need to prevent parent from being clickable on ipad. Doesn't matter if it isn't as always click to pages in menu. well not always need to add pages for project management and ms project, risk etc. - dropdown-toggle diabled needs to be in css for the ipad media query-->
                          <a href="#" title="Project Management Downloads" class="dropdown-toggle disabled" data-toggle="dropdown">Project Templates <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="/project-templates/ms-project-templates.html" title="MS Project Templates">MS Project Templates</a></li>
                            <li><a href="/project-templates/conference-project-plan.html" title="Conference Project Plan">Conference Project Plan</a></li>
                            <li><a href="/project-templates/software-project-plan.html" title="Software Project Plan">Software Project Plan</a></li>
                            <li><a href="/project-templates/project-management-templates.html" title="Project Management Templates">Project Management Templates</a></li>
                             <li class="divider"></li>
                              <li><a href="/magic-whiteboard.html" title="Magic Whiteboard - on a roll">Magic Whiteboard</a></li>
                            <li class="divider"></li>
                            <li><a href="/interactive-process-model-taster.php" title="Prince 2 process model">Prince 2 interactive</a></li>
                            <li class="divider"></li>
                            <li><a href="/plan-project/example-work-breakdown-structures.html" title="Work Breakdown Structure examples">Work Breakdown Structure examples</a></li>
                          </ul>
                        </li>
                                                  <li class="dropdown">
                          <a href="#" title="Project Management" class="dropdown-toggle disabled" data-toggle="dropdown">Project Management <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                          <li><a href="/project-management/project-management.html" title="Project Management article list">Project Management articles</a></li>
								 <li><a href="/plan-project/plan-project.html" title="How to Plan a Project">How to Plan a Project</a></li>
              <li><a href="/project-management/project-methods-vs-tools-techniques.html" title="Project Management Methodologies">Project Methods vs Tools</a></li>
               <li><a href="/plan-project/plan-project-stage1.html" title="Work Breakdown Stucture">Work Breakdown Stucture</a></li>
               <li><a href="/plan-project/plan-project-stage2.html" title="Project Network Diagram">Project Network Diagram</a></li>
               <li><a href="/plan-project/plan-project-stage3.html" title="Estimate task duration">Estimate task duration</a></li>
               <li><a href="/plan-project/plan-project-stage4.html" title="Resource Plan">Resource Plan</a></li>
               <li><a href="/project-templates/ms-project-templates.html" title="Project Plans MS project 2007">Project Plans MS project 2007</a></li>
                    <li><a href="/plan-project/planning-mistake-fixing-start-finish-Dates.html" title="Fixing start and finish dates in MS Project">Fixing Start dates</a></li>
               <li><a href="/plan-project/plan-reduction-crashing.html" title="Crashing project plans">Crashing project plans</a></li>
               <li><a href="/project-management/project-monitoring-and-control.html" title="Project monitoring and control">Monitoring and Control</a></li>
               <li><a href="/risk/nhs-risk-register.html" title="NHS Transition Risk Register - review">NHS Risk Register - review</a></li>
               <li><a href="/risk/risk-management-construction.html" title="Risk Management in Construction">Construction Risk Management</a></li>
                <li><a href="/risk/risk-responses.html" title="Risk Risponses">Risk Responses</a></li>
				<li><a href="/project-management/why-a-project-manager.html" title="why a project manager?">Why a project manager?</a></li>
                <li><a href="/project-management/why-project-management-fails.html" title="Why Project Management fails">Why Project Management Fails</a></li>
                          </ul>
                        </li>
                                                  <li class="dropdown">
                          <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">MS Project <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                         <li><a href="/ms-project/ms-project.html" title="MS project article list">MS Project articles</a></li>
					<li><a href="/ms-project/analyse-ms-project-plan.html" title="How to Analyse an MS Project Plan">Analyse MS Project Plan</a></li>
                   <li><a href="/ms-project/Holidays-MSProject-Calendar.html" title="MS Project calendars adding holidays">Project Calendars</a></li>
                <li><a href="/ms-project/counting-totals-ms-project.html" title="Counting totals in MS Project">Counting totals MS Project</a></li>
               <li><a href="/ms-project/CriticalPath.html" title="Critical Path Analysis">Critical Path Analysis</a></li>
               <li><a href="/ms-project/View-Critical-path-msproject.html" title="View critical path MS Project">Viewing Critical Path</a></li>
               <li><a href="/ms-project/project-constraints.html" title="MS Project Constraints - how to use them">MS Project Constraints - how to</a></li>
               <li><a href="/ms-project/msproject-constraints-part2.html" title="MS Project Constraints - common mistakes">Project Constraints - mistakes</a></li>
                <li><a href="/ms-project/filters.html" title="Using MS Project Filters">Using MS Project Filters</a></li>
                   <li><a href="/ms-project/custom-filters.html" title="MS Project Create Custom Filters">Create Custom Filters</a></li>
                  <li><a href="/ms-project/ms-project-hyperlinks.html" title="how to create hyperlinks in MS Project">Hyperlinks MS Project</a></li>
                   <li>  <a href="/ms-project/ms-project-2010-to-PDF.html" title="MS Project 2010 to pdf">MS Project 2010 to pdf</a></li>
                <li><a href="/ms-project/link-summary-tasks-ms-project.html" title="Why avoid linking summary tasks">Summary tasks</a></li>
                <li><a href="/project-templates/ms-project-templates.html" title="MS Project Templates">MS Project Templates</a></li>
                          </ul>
                        </li>
                                 <!--   <form class="navbar-form" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>-->
				</ul><!--nav navbar-nav-->
      
			</div>
		</nav>
</html>