import React from 'react';
import ReactDOM from 'react-dom';

import axios from 'axios';
import Pagination from 'react-js-pagination';

export default class PersonList extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
        total: 1,
        activePage: 1,
        items: []
    }
  }

  componentDidMount() {
    this.bindData(this.state.activePage);
  }
  bindData(page){
    axios.get(`http://127.0.0.1:8000/api?page=`+page)
      .then(res => {
        const items = res.data;
        //console.log(items);
        this.setState({ items: items.data,total:items.total });
      });

  }

  handlePageChange(pageNumber) {
    this.setState({activePage: pageNumber});
    this.bindData(pageNumber);
  }

  render() {
    return (
    <div className="container">
        <div className="row">
        { this.state.items.map(item => (
            <div className="col-md-3 mb-5" key={item.id}>
                <div className="card text-center">
                    <div className="card-header">{item.brand}</div>
                    <div className="card-body">
                        <img src={item.image} className="card-img-top img-fluid" />
                        <h6 className="card-title">{item.name}</h6>
                    </div>
                    <div className="card-footer text-muted">Cena: {item.price} RSD</div>
                </div>
            </div>
        )
        )}
        <Pagination
            activePage={this.state.activePage}
            itemsCountPerPage={10}
            totalItemsCount={this.state.total}
            pageRangeDisplayed={5}
            onChange={this.handlePageChange.bind(this)}
        />
        </div>
    </div>


    )
  }
}

if (document.getElementById('example')) {
    ReactDOM.render(<PersonList />, document.getElementById('example'));
}
