const { default: axios } = require("axios");

const SWDConfigSignature = {
    startPeroid:"string",
    endPeroid:"string",
    updatedAfter:"string",
    firstNObservations:"string",
    lastNObservations:"string",
    dimensionAtObservationdetail:"string",
    detail:"string",
    includeHistory:"boolean"
}

class SDWService {
    

    static async prepareXML(config={}) {
        const fetched = await this.fetchContent(config);
        //console.log(fetched);
        return fetched;
    }

    static async fetchContent(config={}) {
        return await axios.get(this.generateRoute(config));
    }

    static generateRoute(config={}) {
        let routeBase = "https://sdw-wsrest.ecb.europa.eu/service/schema/datastructure/ECB/ECB_EXR1/1.0?";
        try {
            if(typeof config!=="object" || config===null) throw new Error("SDW config must be a non-nullable object!");
            const optKeys = Object.keys(config);
            for(const SigIndex in config) {
                if(typeof config[SigIndex]==="undefined") continue;
                if(typeof config[SigIndex]!==SWDConfigSignature[SigIndex]) throw new Error(`Signature type of key ${SigIndex} must be compatible with type ${SWDConfigSignature[SigIndex]}, given ${typeof config[SigIndex]}`);
                routeBase += String(config[SigIndex]);
                if(optKeys[optKeys.length - 1]!==SigIndex) routeBase += "&";
            }
            return routeBase;
        } catch(err) {
            console.error(err);
            return "about:blank";
        }
    }
}

module.exports = SDWService;