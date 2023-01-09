import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar';

export class GroupAv extends Component {
    constructor(props){
        super(props)
    }
    
  render() {
    return (
      <div className="row">
      <div className="col-md-12" style={{ marginLeft: 30, marginTop: 20}}>
       <div className="card">
       
         {/* /.card-header */}
         <div className="card-body">
           <div className="row">
             
             {/* /.col */}
             <div className="col-md-12">
               <p className="text-center">
                 <strong>Avancement Group</strong>
               </p>
               <div className="progress-group">
                 <div className="progress progress-sm">
                   <div className="progress-bar bg-primary" style={{width: `${this.props.data}%`}}  label={`${this.props.data}%`}>{this.props.data}%</div>
                 
                 </div>
               </div>  
             </div>
             
           </div>
          
         </div>
      
       </div>
   </div>

  </div>
  
   
    )
  }
}

export default GroupAv