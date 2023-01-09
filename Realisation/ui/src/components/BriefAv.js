import React, { Component } from 'react'
import ProgressBar from 'react-bootstrap/ProgressBar';

export class BriefAv extends Component {
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
                    <strong>Avancement Brief</strong>
                  </p>
                  {this.props.data.map(item=>(
                  <div className="progress-group">
                
                     <span>{item?.brief_name}</span>
                    <div className="progress progress-sm">
                      <div className="progress-bar bg-warning" style={{width: `${item?.brief_av}%`}}  label={`${item?.brief_av}%`}   >{item?.brief_av}%</div>
                    
                    </div>
                  </div>
                  ))}
                  
                 
                </div>
                
              </div>
             
            </div>
         
          </div>
      </div>

     </div>
        
    )
  }
}

export default BriefAv;